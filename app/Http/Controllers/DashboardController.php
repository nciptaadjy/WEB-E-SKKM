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

        // Statistik sertifikat (Best Practice: Agregasi langsung di Database, bukan dari memory/Collection)
        $totalApproved = Sertifikat::where('mahasiswa_id', $mahasiswaId)->where('status', 'approved')->count();
        $totalPending = Sertifikat::where('mahasiswa_id', $mahasiswaId)->whereIn('status', ['pending', 'verified_bem', 'revision'])->count();
        $totalRejected = Sertifikat::where('mahasiswa_id', $mahasiswaId)->where('status', 'rejected')->count();

        // Total poin (Agregasi SUM di level Database)
        $totalPoin = Sertifikat::where('mahasiswa_id', $mahasiswaId)->where('status', 'approved')->sum('bobot_snapshot');

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

        // Pengajuan yang masih dalam proses (real-time tracking)
        $inProgressSertifikats = Sertifikat::where('mahasiswa_id', $mahasiswaId)
            ->whereIn('status', ['pending', 'verified_bem', 'revision'])
            ->with(['kedudukan.subKegiatan.bidangKegiatan', 'verifierBem', 'verifierKhms'])
            ->orderBy('created_at', 'desc')
            ->take(5)
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
            'inProgressSertifikats'
        ));
    }

    /**
     * Berita Event — mahasiswa melihat semua event
     */
    public function events()
    {
        $events = Event::with('subKegiatan.bidangKegiatan')
            ->orderByRaw("CASE WHEN status_event = 'berlangsung' THEN 0 WHEN status_event = 'akan_datang' THEN 1 ELSE 2 END")
            ->orderBy('tanggal_mulai', 'desc')
            ->paginate(12);

        $mahasiswa = \App\Models\Mahasiswa::find(session('mahasiswa_id'));

        return view('mahasiswa.events', compact('events', 'mahasiswa'));
    }
}
