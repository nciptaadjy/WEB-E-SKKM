<?php

namespace App\Http\Controllers\Kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\Sertifikat;
use App\Services\PencapaianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    protected $pencapaianService;

    public function __construct(PencapaianService $pencapaianService)
    {
        $this->pencapaianService = $pencapaianService;
    }

    /**
     * Halaman verifikasi Kemahasiswaan (tahap 2) - Dikelompokkan per Mahasiswa
     */
    public function verifikasi()
    {
        $mahasiswas = \App\Models\Mahasiswa::whereHas('sertifikats', function ($q) {
            $q->where('status', 'verified_bem');
        })
        ->with(['sertifikats' => function ($q) {
            $q->where('status', 'verified_bem')
              ->with(['kedudukan.subKegiatan.bidangKegiatan', 'verifierBem'])
              ->orderBy('created_at', 'asc');
        }])
        ->paginate(5);

        $totalAntrean = Sertifikat::where('status', 'verified_bem')->count();

        return view('Kemahasiswaan.verifikasi-kmhs', compact('mahasiswas', 'totalAntrean'));
    }

    /**
     * Approve sertifikat and increment student points
     */
    public function approve(Request $request, Sertifikat $sertifikat)
    {
        $request->validate([
            'bobot_override'  => 'nullable|numeric|min:0|max:100',
            'catatan_approve' => 'nullable|string|max:500',
        ]);

        $updateData = [
            'status'           => 'approved',
            'verified_by_khms' => Auth::id(),
            'verified_khms_at' => now(),
            'catatan_approve'  => $request->catatan_approve,
        ];

        // Jika Kemahasiswaan mengubah poin, update bobot_snapshot
        if ($request->filled('bobot_override')) {
            $updateData['bobot_snapshot'] = $request->bobot_override;
        }

        $sertifikat->update($updateData);

        $this->pencapaianService->tambahPoin($sertifikat);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Sertifikat berhasil disetujui!']);
        }

        return back()->with('success', 'Sertifikat berhasil disetujui!');
    }

    /**
     * Reject sertifikat
     */
    public function reject(Request $request, Sertifikat $sertifikat)
    {
        $request->validate([
            'catatan_reject' => 'nullable|string|max:500',
        ]);

        $sertifikat->update([
            'status'           => 'rejected',
            'catatan_reject'   => $request->catatan_reject ?? 'Ditolak oleh Kemahasiswaan.',
            'verified_by_khms' => Auth::id(),
            'verified_khms_at' => now(),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Sertifikat ditolak.']);
        }

        return redirect()->back()->with('success', 'Sertifikat ditolak.');
    }

    /**
     * Riwayat verifikasi Kemahasiswaan (ACC/Tolak)
     */
    public function riwayat()
    {
        $adminId = Auth::id();

        $totalAcc = Sertifikat::where('verified_by_khms', $adminId)
            ->where('status', 'approved')
            ->count();

        $totalReject = Sertifikat::where('verified_by_khms', $adminId)
            ->where('status', 'rejected')
            ->count();

        $sertifikats = Sertifikat::where('verified_by_khms', $adminId)
            ->with(['mahasiswa', 'kedudukan.subKegiatan.bidangKegiatan', 'verifierBem'])
            ->orderBy('verified_khms_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        return view('Kemahasiswaan.riwayat-kmhs', compact('sertifikats', 'totalAcc', 'totalReject'));
    }
}
