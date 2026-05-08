<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class OrmawaController extends Controller
{
    /**
     * Dashboard Ormawa — statistik event & sertifikat
     */
    public function index()
    {
        // Ambil event yang dibuat oleh ormawa (user_id = current user)
        $userId = Auth::id();

        $totalEvents = Event::where('user_id', $userId)->count();
        $totalPesertaEvents = Event::where('user_id', $userId)
            ->withCount('pesertaEvents')
            ->get()
            ->sum('peserta_events_count');

        // Statistik sertifikat semua mahasiswa (overview)
        $totalSertifikat = Sertifikat::count();
        $totalPending = Sertifikat::where('status', 'pending')->count();
        $totalApproved = Sertifikat::where('status', 'approved')->count();
        $totalRejected = Sertifikat::where('status', 'rejected')->count();

        // Event terbaru
        $recentEvents = Event::where('user_id', $userId)
            ->with('subKegiatan.bidangKegiatan')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Sertifikat terbaru (all) untuk overview tabel
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
}
