<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\Event;
use App\Models\PesertaEvent;
use App\Models\Mahasiswa;
use App\Models\BatchPenomoran;
use App\Models\BatchPeserta;
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


        $recentEvents = Event::where('user_id', $userId)
            ->with('subKegiatan.bidangKegiatan')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

            
        // Stats for Batch Penomoran
        $totalBatch = BatchPenomoran::where('requested_by', $userId)->count();
        
        $totalBatchPeserta = BatchPeserta::whereHas('batch', function ($q) use ($userId) {
            $q->where('requested_by', $userId);
        })->count();

        $totalBatchPesertaAcc = BatchPeserta::whereHas('batch', function ($q) use ($userId) {
            $q->where('requested_by', $userId)->whereIn('status', ['approved', 'generated']);
        })->count();

        return view('Ormawa.dashboard-ormawa', compact(
            'totalEvents',
            'totalPesertaEvents',
            'recentEvents',
            'totalBatch',
            'totalBatchPeserta',
            'totalBatchPesertaAcc'
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
            'kategori_event'   => 'nullable|string|max:100',
            'deskripsi'        => 'nullable|string|max:1000',
            'sub_kegiatan_id'  => 'required|exists:sub_kegiatans,id',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'status_event'     => 'required|in:akan_datang,berlangsung,selesai',
            'link_form'        => 'nullable|url|max:500',
        ]);

        Event::create([
            'user_id'          => Auth::id(),
            'sub_kegiatan_id'  => $request->sub_kegiatan_id,
            'judul_event'      => $request->judul_event,
            'kategori_event'   => $request->kategori_event,
            'nama_event'       => $request->nama_event ?? $request->judul_event,
            'deskripsi'        => $request->deskripsi,
            'tanggal_mulai'    => $request->tanggal_mulai,
            'tanggal_selesai'  => $request->tanggal_selesai,
            'status_event'     => $request->status_event,
            'link_form'        => $request->link_form,
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
            ->withCount('pesertaBatch')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Ormawa.batch-penomoran', compact('batches'));
    }

    /**
     * Show create batch form
     */
    public function createBatch()
    {
        return view('Ormawa.batch-create');
    }

    /**
     * Store new batch penomoran request with peserta data
     */
    public function storeBatchPenomoran(Request $request)
    {
        $request->validate([
            'nama_event'     => 'required|string|max:255',
            'kategori_event' => 'nullable|string|max:255',
            'format_nomor'   => 'nullable|string|max:255',
            'catatan'        => 'nullable|string|max:500',
            'peserta'        => 'required|array|min:1',
            'peserta.*.identifier' => 'required|string|max:100',
            'peserta.*.nama'       => 'required|string|max:255',
        ]);

        // Validate no duplicates within batch
        $identifiers = collect($request->peserta)->pluck('identifier');
        $duplicates = $identifiers->duplicates();
        if ($duplicates->isNotEmpty()) {
            return back()->withInput()->with('error', 'Terdapat identifier duplikat: ' . $duplicates->unique()->implode(', '));
        }

        DB::beginTransaction();
        try {
            $batch = BatchPenomoran::create([
                'nama_event'     => $request->nama_event,
                'kategori_event' => $request->kategori_event,
                'requested_by'   => Auth::id(),
                'status'         => 'pending',
                'format_nomor'   => $request->format_nomor,
                'total_peserta'  => count($request->peserta),
                'catatan'        => $request->catatan,
            ]);

            foreach ($request->peserta as $p) {
                $identifier = trim($p['identifier']);
                $nama = trim($p['nama']);

                // Check if identifier matches a mahasiswa NIM
                $mahasiswa = Mahasiswa::where('nim', $identifier)->first();

                BatchPeserta::create([
                    'batch_id'     => $batch->id,
                    'identifier'   => $identifier,
                    'nama'         => $nama,
                    'tipe'         => $mahasiswa ? 'mahasiswa' : 'eksternal',
                    'mahasiswa_id' => $mahasiswa?->id,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal membuat batch: ' . $e->getMessage());
        }

        return redirect()->route('ormawa.batch')->with('success', "Batch penomoran berhasil dibuat dengan {$batch->total_peserta} peserta!");
    }

    /**
     * Show batch detail with peserta list
     */
    public function showBatchDetail(BatchPenomoran $batch)
    {
        if ($batch->requested_by !== Auth::id()) {
            abort(403);
        }

        $batch->load(['pesertaBatch', 'approver', 'event']);

        return view('Ormawa.batch-detail', compact('batch'));
    }

    /**
     * Update batch that is in revision status
     */
    public function updateBatch(Request $request, BatchPenomoran $batch)
    {
        if ($batch->requested_by !== Auth::id()) {
            abort(403);
        }

        if (!in_array($batch->status, ['revision', 'draft'])) {
            return back()->with('error', 'Batch ini tidak dapat diedit.');
        }

        $request->validate([
            'nama_event'     => 'required|string|max:255',
            'kategori_event' => 'nullable|string|max:255',
            'format_nomor'   => 'nullable|string|max:255',
            'catatan'        => 'nullable|string|max:500',
            'peserta'        => 'required|array|min:1',
            'peserta.*.identifier' => 'required|string|max:100',
            'peserta.*.nama'       => 'required|string|max:255',
        ]);

        // Validate no duplicates
        $identifiers = collect($request->peserta)->pluck('identifier');
        $duplicates = $identifiers->duplicates();
        if ($duplicates->isNotEmpty()) {
            return back()->withInput()->with('error', 'Terdapat identifier duplikat: ' . $duplicates->unique()->implode(', '));
        }

        DB::beginTransaction();
        try {
            $batch->update([
                'nama_event'     => $request->nama_event,
                'kategori_event' => $request->kategori_event,
                'format_nomor'   => $request->format_nomor,
                'total_peserta'  => count($request->peserta),
                'catatan'        => $request->catatan,
                'status'         => 'pending',
                'catatan_revisi' => null,
            ]);

            // Delete existing peserta and re-insert
            $batch->pesertaBatch()->delete();

            foreach ($request->peserta as $p) {
                $identifier = trim($p['identifier']);
                $nama = trim($p['nama']);

                $mahasiswa = Mahasiswa::where('nim', $identifier)->first();

                BatchPeserta::create([
                    'batch_id'     => $batch->id,
                    'identifier'   => $identifier,
                    'nama'         => $nama,
                    'tipe'         => $mahasiswa ? 'mahasiswa' : 'eksternal',
                    'mahasiswa_id' => $mahasiswa?->id,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal mengupdate batch: ' . $e->getMessage());
        }

        return redirect()->route('ormawa.batch.show', $batch)->with('success', 'Batch berhasil diupdate dan dikirim ulang!');
    }

    /**
     * Download batch results as CSV
     */
    public function downloadBatch(BatchPenomoran $batch)
    {
        if ($batch->requested_by !== Auth::id()) {
            abort(403);
        }

        if ($batch->status !== 'generated') {
            return back()->with('error', 'Batch belum di-generate.');
        }

        $peserta = $batch->pesertaBatch;

        $filename = 'batch_penomoran_' . $batch->id . '_' . now()->format('Ymd') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($peserta) {
            $file = fopen('php://output', 'w');
            // BOM for Excel UTF-8
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($file, ['NIM/ID/NIK', 'Nama', 'Tipe', 'Nomor Sertifikat']);

            foreach ($peserta as $p) {
                fputcsv($file, [
                    $p->identifier,
                    $p->nama,
                    $p->tipe,
                    $p->nomor_sertifikat ?? '-',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Parse CSV file and return JSON for preview (AJAX)
     */
    public function parseCsvPeserta(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('csv_file');
        $content = file_get_contents($file->getRealPath());
        $lines = array_filter(explode("\n", $content));

        $peserta = [];
        $errors = [];
        $seenIdentifiers = [];

        foreach ($lines as $i => $line) {
            $line = trim($line);
            if (empty($line)) continue;

            // Skip header
            if ($i === 0 && (stripos($line, 'nim') !== false || stripos($line, 'id') !== false || stripos($line, 'nik') !== false || stripos($line, 'nama') !== false)) {
                continue;
            }

            $cols = str_getcsv($line, ',');
            $identifier = trim($cols[0] ?? '');
            $nama = trim($cols[1] ?? '');

            if (empty($identifier) || empty($nama)) {
                $errors[] = "Baris " . ($i + 1) . ": identifier atau nama kosong.";
                continue;
            }

            if (in_array($identifier, $seenIdentifiers)) {
                $errors[] = "Baris " . ($i + 1) . ": identifier '{$identifier}' duplikat.";
                continue;
            }

            $seenIdentifiers[] = $identifier;

            // Check if mahasiswa
            $mahasiswa = Mahasiswa::where('nim', $identifier)->first();

            $peserta[] = [
                'identifier' => $identifier,
                'nama'       => $nama,
                'tipe'       => $mahasiswa ? 'mahasiswa' : 'eksternal',
            ];
        }

        return response()->json([
            'peserta' => $peserta,
            'errors'  => $errors,
            'total'   => count($peserta),
        ]);
    }
}
