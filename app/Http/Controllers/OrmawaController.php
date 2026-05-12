<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\Event;
use App\Models\PesertaEvent;
use App\Models\Mahasiswa;
use App\Models\BatchPenomoran;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrmawaController extends Controller
{
    /**
     * Dashboard Ormawa — statistik event & sertifikat
     */
    public function index()
    {
        $userId = Auth::id();

        $totalEvents = Event::where('user_id', $userId)->count();
        $totalPesertaEvents = Event::where('user_id', $userId)
            ->withCount('pesertaEvents')
            ->get()
            ->sum('peserta_events_count');

        $totalSertifikat = Sertifikat::count();
        $totalPending = Sertifikat::where('status', 'pending')->count();
        $totalApproved = Sertifikat::where('status', 'approved')->count();
        $totalRejected = Sertifikat::where('status', 'rejected')->count();

        $recentEvents = Event::where('user_id', $userId)
            ->with('subKegiatan.bidangKegiatan')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $recentSertifikats = Sertifikat::with(['mahasiswa', 'kedudukan.subKegiatan.bidangKegiatan'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('Ormawa.dashboard-ormawa', compact(
            'totalEvents',
            'totalPesertaEvents',
            'totalSertifikat',
            'totalPending',
            'totalApproved',
            'totalRejected',
            'recentEvents',
            'recentSertifikats'
        ));
    }

    // ══════════════════════════════════════════════
    // EVENT MANAGEMENT (Berita Event)
    // ══════════════════════════════════════════════

    /**
     * List all events for this Ormawa
     */
    public function events()
    {
        $events = Event::where('user_id', Auth::id())
            ->with('subKegiatan.bidangKegiatan')
            ->withCount('pesertaEvents')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Ormawa.events', compact('events'));
    }

    /**
     * Show create event form
     */
    public function createEvent()
    {
        $subKegiatans = SubKegiatan::with('bidangKegiatan')->get();
        return view('Ormawa.event-create', compact('subKegiatans'));
    }

    /**
     * Store new event
     */
    public function storeEvent(Request $request)
    {
        $request->validate([
            'judul_event'      => 'required|string|max:255',
            'nama_event'       => 'nullable|string|max:255',
            'deskripsi'        => 'nullable|string|max:1000',
            'sub_kegiatan_id'  => 'required|exists:sub_kegiatans,id',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'status_event'     => 'required|in:akan_datang,berlangsung,selesai',
            'link_form'        => 'nullable|url|max:500',
        ]);

        Event::create([
            'user_id'         => Auth::id(),
            'sub_kegiatan_id' => $request->sub_kegiatan_id,
            'judul_event'     => $request->judul_event,
            'nama_event'      => $request->nama_event ?? $request->judul_event,
            'deskripsi'       => $request->deskripsi,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status_event'    => $request->status_event,
            'link_form'       => $request->link_form,
        ]);

        return redirect()->route('ormawa.events')->with('success', 'Event berhasil dibuat!');
    }

    /**
     * Delete event
     */
    public function deleteEvent(Event $event)
    {
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }
        $event->delete();
        return back()->with('success', 'Event berhasil dihapus.');
    }

    // ══════════════════════════════════════════════
    // CSV UPLOAD PESERTA EVENT
    // ══════════════════════════════════════════════

    /**
     * Show upload CSV form for an event
     */
    public function showUploadPeserta(Event $event)
    {
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }

        $peserta = PesertaEvent::where('event_id', $event->id)
            ->with('mahasiswa')
            ->get();

        return view('Ormawa.upload-peserta', compact('event', 'peserta'));
    }

    /**
     * Process CSV upload for an event
     * CSV format: nim (each row contains NIM of participant)
     */
    public function uploadPeserta(Request $request, Event $event)
    {
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'csv_file'     => 'required|file|mimes:csv,txt|max:2048',
            'kedudukan_id' => 'required|exists:kedudukans,id',
        ]);

        $file = $request->file('csv_file');
        $content = file_get_contents($file->getRealPath());
        $lines = array_filter(explode("\n", $content));

        $imported = 0;
        $skipped = 0;
        $errors = [];

        DB::beginTransaction();
        try {
            foreach ($lines as $i => $line) {
                $line = trim($line);
                if (empty($line)) continue;

                // Skip header row
                if ($i === 0 && (stripos($line, 'nim') !== false || !is_numeric(str_replace([',', ';', '"'], '', $line)))) {
                    continue;
                }

                // Parse CSV - could be comma or semicolon separated
                $cols = str_getcsv($line, ',');
                $nim = trim($cols[0] ?? '');

                if (empty($nim)) continue;

                // Find mahasiswa by NIM
                $mahasiswa = Mahasiswa::where('nim', $nim)->first();
                if (!$mahasiswa) {
                    $skipped++;
                    $errors[] = "Baris " . ($i + 1) . ": NIM '{$nim}' tidak ditemukan.";
                    continue;
                }

                // Check duplicate
                $exists = PesertaEvent::where('event_id', $event->id)
                    ->where('mahasiswa_id', $mahasiswa->id)
                    ->exists();

                if ($exists) {
                    $skipped++;
                    continue;
                }

                PesertaEvent::create([
                    'event_id'      => $event->id,
                    'mahasiswa_id'  => $mahasiswa->id,
                    'kedudukan_id'  => $request->kedudukan_id,
                ]);

                $imported++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengupload CSV: ' . $e->getMessage());
        }

        $msg = "Berhasil mengimport {$imported} peserta.";
        if ($skipped > 0) {
            $msg .= " {$skipped} baris dilewati.";
        }

        return back()->with('success', $msg)->with('csv_errors', $errors);
    }

    // ══════════════════════════════════════════════
    // BATCH PENOMORAN SERTIFIKAT
    // ══════════════════════════════════════════════

    /**
     * Show list of batch penomoran requests
     */
    public function batchPenomoran()
    {
        $batches = BatchPenomoran::where('requested_by', Auth::id())
            ->with(['event', 'approver'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $events = Event::where('user_id', Auth::id())
            ->has('pesertaEvents')
            ->get();

        return view('Ormawa.batch-penomoran', compact('batches', 'events'));
    }

    /**
     * Store new batch penomoran request
     */
    public function storeBatchPenomoran(Request $request)
    {
        $request->validate([
            'event_id'     => 'required|exists:events,id',
            'format_nomor' => 'nullable|string|max:255',
            'catatan'      => 'nullable|string|max:500',
        ]);

        // Verify event belongs to this user
        $event = Event::where('id', $request->event_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Check if batch already exists for this event
        $exists = BatchPenomoran::where('event_id', $event->id)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'Batch penomoran untuk event ini sudah ada.');
        }

        BatchPenomoran::create([
            'event_id'      => $event->id,
            'requested_by'  => Auth::id(),
            'format_nomor'  => $request->format_nomor,
            'catatan'       => $request->catatan,
        ]);

        return back()->with('success', 'Request batch penomoran berhasil dikirim!');
    }
}
