<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrmawaController extends Controller
{
    /**
     * Dashboard Ormawa — statistik event & sertifikat
     */
    public function index()
    {
        $userId = Auth::id();

        $totalEvents = Event::where('user_id', $userId)->count();

        $recentEvents = Event::where('user_id', $userId)
            ->with('subKegiatan.bidangKegiatan')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('Ormawa.dashboard-ormawa', compact(
            'totalEvents',
            'recentEvents'
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

}
