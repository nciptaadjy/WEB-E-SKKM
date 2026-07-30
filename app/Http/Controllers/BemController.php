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
     * Halaman verifikasi BEM — tabel antrean (Dikelompokkan per Mahasiswa)
     */
    public function verifikasi()
    {
        $mahasiswas = \App\Models\Mahasiswa::whereHas('sertifikats', function ($q) {
            $q->where('status', 'pending');
        })
        ->with(['sertifikats' => function ($q) {
            $q->where('status', 'pending')
              ->with('kedudukan.subKegiatan.bidangKegiatan')
              ->orderBy('created_at', 'asc');
        }])
        ->paginate(5);

        $totalAntrean = Sertifikat::where('status', 'pending')->count();

        return view('BEM.verifikasi-bem', compact('mahasiswas', 'totalAntrean'));
    }

    /**
     * Setujui sertifikat (BEM verifikasi tahap 1)
     */
    public function approve(Request $request, Sertifikat $sertifikat)
    {
        $request->validate([
            'bobot_override' => 'nullable|numeric|min:0|max:100',
        ]);

        $updateData = [
            'status' => 'verified_bem',
            'verified_by_bem' => Auth::id(),
            'verified_bem_at' => now(),
        ];

        // Jika BEM mengubah poin, update bobot_snapshot
        if ($request->filled('bobot_override')) {
            $updateData['bobot_snapshot'] = $request->bobot_override;
        }

        $sertifikat->update($updateData);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Sertifikat berhasil diverifikasi.']);
        }

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

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Sertifikat ditolak.']);
        }

        return redirect()->back()->with('success', 'Sertifikat ditolak.');
    }

    /**
     * Riwayat verifikasi BEM (ACC/Tolak)
     */
    public function riwayat()
    {
        $adminId = Auth::id();

        $totalAcc = Sertifikat::where('verified_by_bem', $adminId)
            ->whereIn('status', ['verified_bem', 'approved'])
            ->count();

        $totalReject = Sertifikat::where('verified_by_bem', $adminId)
            ->where('status', 'rejected')
            ->count();

        $sertifikats = Sertifikat::where('verified_by_bem', $adminId)
            ->with(['mahasiswa', 'kedudukan.subKegiatan.bidangKegiatan'])
            ->orderBy('verified_bem_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        return view('BEM.riwayat-bem', compact('sertifikats', 'totalAcc', 'totalReject'));
    }
}
