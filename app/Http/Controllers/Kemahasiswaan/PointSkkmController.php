<?php

namespace App\Http\Controllers\Kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\BidangKegiatan;
use App\Models\SubKegiatan;
use App\Models\Kedudukan;
use App\Models\BobotSkkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointSkkmController extends Controller
{
    /**
     * Halaman Manage Poin SKKM
     */
    public function managePoint($bidang = null)
    {
        $bidangs = BidangKegiatan::with(['subKegiatans.kedudukans.bobotSkkms'])->get();

        return view('Kemahasiswaan.manage-point', compact('bidangs'));
    }

    /**
     * Update Bobot SKKM
     */
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

    /**
     * Tambah Bidang Kegiatan
     */
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

    /**
     * Update Bidang Kegiatan
     */
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

    /**
     * Hapus Bidang Kegiatan
     */
    public function deleteBidang(BidangKegiatan $bidang)
    {
        $nama = $bidang->nama_bidang;
        $bidang->delete();
        return back()->with('success', "Bidang '{$nama}' berhasil dihapus.");
    }

    /**
     * Tambah Sub Kegiatan
     */
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

    /**
     * Update Sub Kegiatan
     */
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

    /**
     * Hapus Sub Kegiatan
     */
    public function deleteSubKegiatan(SubKegiatan $sub)
    {
        $sub->delete();
        return back()->with('success', "Sub kegiatan berhasil dihapus.");
    }

    /**
     * Tambah Kedudukan
     */
    public function storeKedudukan(Request $request)
    {
        $request->validate([
            'sub_kegiatan_id' => 'required',
            'nama_kedudukan'  => 'required|string|max:150',
        ]);

        $sub = SubKegiatan::findOrFail($request->sub_kegiatan_id);

        $kedudukan = Kedudukan::create([
            'sub_kegiatan_id' => $sub->id,
            'nama_kedudukan'  => $request->nama_kedudukan,
            'is_active'       => true,
        ]);

        if ($sub->has_tingkat) {
            $tingkats = ['perguruan_tinggi', 'regional', 'nasional', 'internasional'];
        } else {
            $tingkats = ['perguruan_tinggi'];
        }

        foreach ($tingkats as $t) {
            BobotSkkm::create([
                'kedudukan_id' => $kedudukan->id,
                'tingkat'      => $t,
                'bobot'        => 0,
                'updated_by'   => Auth::id(),
            ]);
        }

        return back()->with('success', "Kedudukan '{$request->nama_kedudukan}' berhasil ditambahkan.");
    }

    /**
     * Update Kedudukan
     */
    public function updateKedudukan(Request $request, Kedudukan $kedudukan)
    {
        $request->validate([
            'nama_kedudukan' => 'required|string|max:150',
        ]);

        $kedudukan->update([
            'nama_kedudukan' => $request->nama_kedudukan,
        ]);

        return back()->with('success', "Kedudukan berhasil diupdate.");
    }

    /**
     * Hapus Kedudukan
     */
    public function deleteKedudukan(Kedudukan $kedudukan)
    {
        $kedudukan->delete();
        return back()->with('success', "Kedudukan berhasil dihapus.");
    }
}
