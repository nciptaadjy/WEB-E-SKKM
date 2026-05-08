<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Sertifikat;
use App\Models\BidangKegiatan;
use App\Models\Event;
use App\Models\Pencapaian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Dashboard mahasiswa — data dinamis
     */
    public function index()
    {
        $mahasiswaId = session('mahasiswa_id');
        $mahasiswa = Mahasiswa::find($mahasiswaId);

        // Statistik sertifikat
        $sertifikats = Sertifikat::where('mahasiswa_id', $mahasiswaId)->get();
        $totalApproved = $sertifikats->where('status', 'approved')->count();
        $totalPending = $sertifikats->whereIn('status', ['pending', 'verified_bem'])->count();
        $totalRejected = $sertifikats->where('status', 'rejected')->count();

        // Total poin (hanya dari sertifikat yang approved)
        $totalPoin = $sertifikats->where('status', 'approved')->sum('bobot_snapshot');

        // Progress per bidang kegiatan
        $bidangKegiatans = BidangKegiatan::where('is_active', true)->get();
        $progressPerBidang = [];

        foreach ($bidangKegiatans as $bidang) {
            $poinBidang = Sertifikat::where('mahasiswa_id', $mahasiswaId)
                ->where('status', 'approved')
                ->whereHas('kedudukan.subKegiatan', function ($q) use ($bidang) {
                    $q->where('bidang_kegiatan_id', $bidang->id);
                })
                ->sum('bobot_snapshot');

            $progressPerBidang[] = [
                'nama' => $bidang->nama_bidang,
                'poin' => $poinBidang,
                'is_wajib' => $bidang->is_wajib,
            ];
        }

        // Event terbaru
        $events = Event::whereIn('status_event', ['akan_datang', 'berlangsung'])
            ->with('subKegiatan.bidangKegiatan')
            ->orderBy('tanggal_mulai', 'asc')
            ->take(5)
            ->get();

        // Sertifikat terakhir diajukan
        $recentSertifikats = Sertifikat::where('mahasiswa_id', $mahasiswaId)
            ->with('kedudukan.subKegiatan.bidangKegiatan')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('mahasiswa.dashboard-mahasiswa', compact(
            'mahasiswa',
            'totalApproved',
            'totalPending',
            'totalRejected',
            'totalPoin',
            'progressPerBidang',
            'events',
            'recentSertifikats',
            'sertifikats'
        ));
    }
}
