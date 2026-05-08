<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BemController extends Controller
{
    /**
     * Dashboard BEM — statistik verifikasi
     */
    public function index()
    {
        $totalPending = Sertifikat::where('status', 'pending')->count();
        $totalVerified = Sertifikat::where('status', 'verified_bem')->count();
        $totalRejected = Sertifikat::whereNotNull('verified_by_bem')
            ->where('status', 'rejected')
            ->count();

        // Sertifikat pending terbaru
        $pendingSertifikats = Sertifikat::where('status', 'pending')
            ->with(['mahasiswa', 'kedudukan.subKegiatan.bidangKegiatan'])
            ->orderBy('created_at', 'asc')
            ->take(10)
            ->get();

        return view('BEM.dashboard-bem', compact(
            'totalPending',
            'totalVerified',
            'totalRejected',
            'pendingSertifikats'
        ));
    }

    /**
     * Halaman verifikasi BEM — tabel antrean
     */
    public function verifikasi()
    {
        $sertifikats = Sertifikat::where('status', 'pending')
            ->with(['mahasiswa', 'kedudukan.subKegiatan.bidangKegiatan'])
            ->orderBy('created_at', 'asc')
            ->paginate(15);

        $totalAntrean = Sertifikat::where('status', 'pending')->count();
        // echo $sertifikats->toJson();
        return view('BEM.verifikasi-bem', compact('sertifikats', 'totalAntrean'));
    }

    /**
     * Setujui sertifikat (BEM verifikasi tahap 1)
     */
    public function approve(Sertifikat $sertifikat)
    {
        $sertifikat->update([
            'status' => 'verified_bem',
            'verified_by_bem' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Sertifikat berhasil diverifikasi.');
    }

    /**
     * Tolak sertifikat (BEM)
     */
    public function reject(Request $request, Sertifikat $sertifikat)
    {
        $request->validate([
            'catatan_reject' => 'nullable|string|max:500',
        ]);

        $sertifikat->update([
            'status' => 'rejected',
            'catatan_reject' => $request->catatan_reject ?? 'Ditolak oleh BEM.',
            'verified_by_bem' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Sertifikat ditolak.');
    }
}
