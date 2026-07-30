<?php

namespace App\Http\Controllers;

use App\Models\BidangKegiatan;
use Illuminate\Http\Request;

class PanduanController extends Controller
{
    /**
     * Halaman panduan utama — tampilkan tabel bobot SKKM
     */
    public function index()
    {
        $bidangKegiatans = BidangKegiatan::where('is_active', true)
            ->with([
                'subKegiatans.kedudukans.bobotSkkms',
            ])
            ->get();

        return view('mahasiswa.panduan', compact('bidangKegiatans'));
    }

    public function tentangSkkm()
    {
        return view('mahasiswa.panduan.tentang-skkm');
    }

    public function bobotSkkm()
    {
        $bidangKegiatans = BidangKegiatan::where('is_active', true)
            ->with([
                'subKegiatans.kedudukans.bobotSkkms',
            ])
            ->get();

        return view('mahasiswa.panduan.bobot-skkm', compact('bidangKegiatans'));
    }

    public function alurPengajuan()
    {
        return view('mahasiswa.panduan.alur-pengajuan');
    }
}
