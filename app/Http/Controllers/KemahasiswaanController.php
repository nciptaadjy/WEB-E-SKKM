<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\Pencapaian;
use App\Models\PencapaianDetail;
use App\Models\BidangKegiatan;
use App\Models\SubKegiatan;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\BobotSkkm;
use App\Models\BatchPenomoran;
use App\Models\NomorSertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $totalAntrean = Sertifikat::where('status', 'verified_bem')->count();

        return view('Kemahasiswaan.verifikasi-kmhs', compact('sertifikats', 'totalAntrean'));
    }

    /**
     * Approve sertifikat (verifikasi final Kemahasiswaan)
     */
    public function approve(Sertifikat $sertifikat)
    {
        $sertifikat->update([
            'status'           => 'approved',
            'verified_by_khms' => Auth::id(),
        ]);

        $this->tambahPoin($sertifikat);

        return back()->with('success', 'Sertifikat berhasil disetujui!');
    }

    private function tambahPoin(Sertifikat $sertifikat)
    {
        $pencapaian = Pencapaian::firstOrCreate([
            'mahasiswa_id' => $sertifikat->mahasiswa_id,
        ]);

        $bidangId = $sertifikat->kedudukan
            ->subKegiatan
            ->bidangKegiatan
            ->id;

        $detail = PencapaianDetail::firstOrCreate([
            'pencapaian_id'     => $pencapaian->id,
            'bidang_kegiatan_id'=> $bidangId,
        ]);

        $detail->increment('total_poin', $sertifikat->bobot_snapshot);

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

    // ══════════════════════════════════════════════
    // ACCOUNT MANAGEMENT (BEM & Ormawa)
    // ══════════════════════════════════════════════

    public function manageAkun()
    {
        $users = User::whereIn('role', ['bem', 'ormawa'])
            ->orderBy('role')
            ->orderBy('nama_pengguna')
            ->paginate(15);

        return view('Kemahasiswaan.manage-akun', compact('users'));
    }

    public function storeAkun(Request $request)
    {
        $request->validate([
            'username'      => 'required|string|max:50|unique:users,username',
            'nama_pengguna' => 'required|string|max:100',
            'password'      => 'required|string|min:6',
            'role'          => 'required|in:bem,ormawa',
        ]);

        User::create([
            'username'      => $request->username,
            'nama_pengguna' => $request->nama_pengguna,
            'password'      => Hash::make($request->password),
            'role'          => $request->role,
        ]);

        return back()->with('success', "Akun {$request->role} berhasil dibuat!");
    }

    public function deleteAkun(User $user)
    {
        if (!in_array($user->role, ['bem', 'ormawa'])) {
            return back()->with('error', 'Tidak dapat menghapus akun ini.');
        }

        $user->delete();
        return back()->with('success', 'Akun berhasil dihapus.');
    }

    public function resetPassword(Request $request, User $user)
    {
        if (!in_array($user->role, ['bem', 'ormawa'])) {
            return back()->with('error', 'Tidak dapat mereset password akun ini.');
        }

        $request->validate([
            'new_password' => 'required|string|min:6',
        ]);

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', "Password untuk {$user->nama_pengguna} berhasil direset.");
    }

    // ══════════════════════════════════════════════
    // BATCH PENOMORAN APPROVAL
    // ══════════════════════════════════════════════

    public function batchPenomoran()
    {
        $batches = BatchPenomoran::with(['event.pesertaEvents', 'requester', 'approver'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('Kemahasiswaan.batch-penomoran', compact('batches'));
    }

    public function approveBatch(Request $request, BatchPenomoran $batch)
    {
        if ($batch->status !== 'pending') {
            return back()->with('error', 'Batch ini sudah diproses.');
        }

        $batch->update([
            'status'      => 'approved',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        // Generate nomor sertifikat for each peserta
        $format = $batch->format_nomor ?: 'SKKM/{nomor}/{tahun}';
        $peserta = $batch->event->pesertaEvents;
        $tahun = date('Y');
        $counter = NomorSertifikat::count() + 1;

        foreach ($peserta as $p) {
            $nomor = str_replace(
                ['{nomor}', '{tahun}'],
                [str_pad($counter, 4, '0', STR_PAD_LEFT), $tahun],
                $format
            );

            NomorSertifikat::create([
                'batch_id'         => $batch->id,
                'peserta_event_id' => $p->id,
                'nomor_sertifikat' => $nomor,
            ]);

            $p->update(['status_sertifikat' => 'sudah_generate']);
            $counter++;
        }

        return back()->with('success', "Batch disetujui! {$peserta->count()} nomor sertifikat berhasil digenerate.");
    }

    public function rejectBatch(Request $request, BatchPenomoran $batch)
    {
        $request->validate([
            'catatan' => 'nullable|string|max:500',
        ]);

        $batch->update([
            'status'      => 'rejected',
            'catatan'     => $request->catatan ?? 'Ditolak oleh Kemahasiswaan.',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Batch penomoran ditolak.');
    }

    // ══════════════════════════════════════════════
    // MANAGE POINT SKKM
    // ══════════════════════════════════════════════

    public function managePoint()
    {
        $bidangs = BidangKegiatan::with(['subKegiatans.kedudukans.bobotSkkms'])->get();

        return view('Kemahasiswaan.manage-point', compact('bidangs'));
    }

    public function updateBobot(Request $request, BobotSkkm $bobot)
    {
        $request->validate([
            'bobot' => 'required|numeric|min:0|max:100',
        ]);

        $bobot->update([
            'bobot'      => $request->bobot,
            'updated_by' => Auth::id(),
        ]);

        return back()->with('success', 'Bobot berhasil diupdate.');
    }

    public function updateBidang(Request $request, BidangKegiatan $bidang)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:100',
            'is_wajib'    => 'required|boolean',
        ]);

        $bidang->update([
            'nama_bidang' => $request->nama_bidang,
            'is_wajib'    => $request->is_wajib,
        ]);

        return back()->with('success', "Bidang '{$bidang->nama_bidang}' berhasil diupdate.");
    }

    public function storeBidang(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:100',
            'is_wajib'    => 'required|boolean',
        ]);

        BidangKegiatan::create([
            'nama_bidang' => $request->nama_bidang,
            'is_wajib'    => $request->is_wajib,
            'is_active'   => true,
        ]);

        return back()->with('success', "Bidang '{$request->nama_bidang}' berhasil ditambahkan.");
    }

    public function deleteBidang(BidangKegiatan $bidang)
    {
        $nama = $bidang->nama_bidang;
        $bidang->delete();
        return back()->with('success', "Bidang '{$nama}' berhasil dihapus.");
    }

    public function storeSubKegiatan(Request $request)
    {
        $request->validate([
            'bidang_kegiatan_id' => 'required|exists:bidang_kegiatan,id',
            'nama_sub'           => 'required|string|max:150',
            'has_tingkat'        => 'required|boolean',
        ]);

        SubKegiatan::create([
            'bidang_kegiatan_id' => $request->bidang_kegiatan_id,
            'nama_sub'           => $request->nama_sub,
            'has_tingkat'        => $request->has_tingkat,
            'is_active'          => true,
        ]);

        return back()->with('success', "Sub kegiatan '{$request->nama_sub}' berhasil ditambahkan.");
    }

    public function updateSubKegiatan(Request $request, SubKegiatan $sub)
    {
        $request->validate([
            'nama_sub'    => 'required|string|max:150',
            'has_tingkat' => 'required|boolean',
        ]);

        $sub->update([
            'nama_sub'    => $request->nama_sub,
            'has_tingkat' => $request->has_tingkat,
        ]);

        return back()->with('success', "Sub kegiatan berhasil diupdate.");
    }

    public function deleteSubKegiatan(SubKegiatan $sub)
    {
        $sub->delete();
        return back()->with('success', "Sub kegiatan berhasil dihapus.");
    }
}
