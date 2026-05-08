<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\Pencapaian;
use App\Models\PencapaianDetail;
use App\Models\BidangKegiatan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KemahasiswaanController extends Controller
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

        // Sertifikat yang sudah diverifikasi BEM (menunggu verifikasi final)
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

    /**
     * Halaman verifikasi Kemahasiswaan (tahap 2)
     */
    public function verifikasi()
    {
        $sertifikats = Sertifikat::where('status', 'verified_bem')
            ->with(['mahasiswa', 'kedudukan.subKegiatan.bidangKegiatan', 'verifierBem'])
            ->orderBy('created_at', 'asc')
            ->paginate(15);

        $totalAntrean = Sertifikat::where('status', 'verified_by_bem')->count();

        // echo $sertifikats->toJson();
        return view('Kemahasiswaan.verifikasi-kmhs', compact('sertifikats', 'totalAntrean'));
    }

    /**
     * Approve sertifikat (verifikasi final Kemahasiswaan)
     * Menambahkan poin ke pencapaian mahasiswa
     */
    public function approve(Sertifikat $sertifikat)
    {
        $sertifikat->update([
            'status'           => 'approved',
            'verified_by_khms' => Auth::id(),
        ]);

        // Tambah poin ke pencapaian mahasiswa
        $this->tambahPoin($sertifikat);

        return back()->with('success', 'Sertifikat berhasil disetujui!');
    }

    private function tambahPoin(Sertifikat $sertifikat)
    {
        // Cari atau buat pencapaian mahasiswa
        $pencapaian = Pencapaian::firstOrCreate([
            'mahasiswa_id' => $sertifikat->mahasiswa_id,
        ]);

        // Cari bidang kegiatan dari relasi
        $bidangId = $sertifikat->kedudukan
            ->subKegiatan
            ->bidangKegiatan
            ->id;

        // Update total per bidang
        $detail = PencapaianDetail::firstOrCreate([
            'pencapaian_id'     => $pencapaian->id,
            'bidang_kegiatan_id'=> $bidangId,
        ]);

        $detail->increment('total_poin', $sertifikat->bobot_snapshot);

        // Update total keseluruhan
        $pencapaian->update([
            'total_keseluruhan' => $pencapaian->details->sum('total_poin'),
        ]);
    }

    /**
     * Reject sertifikat (Kemahasiswaan)
     */
    public function reject(Request $request, Sertifikat $sertifikat)
    {
        $request->validate([
            'catatan_reject' => 'nullable|string|max:500',
        ]);

        $sertifikat->update([
            'status' => 'rejected',
            'catatan_reject' => $request->catatan_reject ?? 'Ditolak oleh Kemahasiswaan.',
            'verified_by_khms' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Sertifikat ditolak.');
    }

    /**
     * Update pencapaian mahasiswa setelah sertifikat approved
     */
    private function updatePencapaian(Sertifikat $sertifikat)
    {
        $mahasiswaId = $sertifikat->mahasiswa_id;

        // Ambil/buat record pencapaian
        $pencapaian = Pencapaian::firstOrCreate(
            ['mahasiswa_id' => $mahasiswaId],
            ['total_keseluruhan' => 0]
        );

        // Ambil bidang kegiatan dari sertifikat
        $bidangId = $sertifikat->kedudukan?->subKegiatan?->bidang_kegiatan_id;

        if ($bidangId) {
            // Update atau buat detail pencapaian per bidang
            $detail = PencapaianDetail::firstOrCreate(
                [
                    'pencapaian_id' => $pencapaian->id,
                    'bidang_kegiatan_id' => $bidangId,
                ],
                ['total_poin' => 0]
            );

            $detail->increment('total_poin', $sertifikat->bobot_snapshot);
        }

        // Recalculate total keseluruhan
        $pencapaian->recalculate();
    }
}
