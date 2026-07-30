<?php

namespace App\Http\Controllers\Kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\Sertifikat;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    /**
     * Dashboard Kemahasiswaan — statistik keseluruhan
     */
    public function index()
    {
        $totalApproved = Sertifikat::where('status', 'approved')->count();
        $totalRejected = Sertifikat::where('status', 'rejected')->count();
        $totalPending = Sertifikat::whereIn('status', ['pending', 'verified_bem'])->count();
        $totalVerifiedBem = Sertifikat::where('status', 'verified_bem')->count();

        $totalMahasiswa = Mahasiswa::count();

        $pendingSertifikats = Sertifikat::where('status', 'verified_bem')
            ->with(['mahasiswa', 'kedudukan.subKegiatan.bidangKegiatan', 'verifierBem'])
            ->orderBy('created_at', 'asc')
            ->take(10)
            ->get();
            
        return view('Kemahasiswaan.dashboard-kmhs', compact(
            'totalApproved',
            'totalRejected',
            'totalPending',
            'totalVerifiedBem',
            'totalMahasiswa',
            'pendingSertifikats'
        ));
    }
}
