<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\BidangKegiatan;
use App\Models\BobotSkkm;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    /**
     * List sertifikat milik mahasiswa yang login
     */
    public function index()
    {
        $mahasiswaId = session('mahasiswa_id');

        // Statistik (Best Practice: Query agregasi di database, bukan load semua ke memori)
        $totalPoin = Sertifikat::where('mahasiswa_id', $mahasiswaId)->where('status', 'approved')->sum('bobot_snapshot');
        $totalApproved = Sertifikat::where('mahasiswa_id', $mahasiswaId)->where('status', 'approved')->count();
        $totalPending = Sertifikat::where('mahasiswa_id', $mahasiswaId)->whereIn('status', ['pending', 'verified_bem', 'revision'])->count();

        // Paginated list
        $sertifikats = Sertifikat::where('mahasiswa_id', $mahasiswaId)
            ->with(['kedudukan.subKegiatan.bidangKegiatan'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('mahasiswa.list-sertifikat', compact(
            'sertifikats',
            'totalPoin',
            'totalApproved',
            'totalPending'
        ));
    }

    /**
     * Form upload sertifikat — load dropdown dari database
     */
    public function create()
    {
        $bidangKegiatans = BidangKegiatan::where('is_active', true)
            ->with([
                'subKegiatans' => function ($q) {
                    $q->where('is_active', true);
                },
                'subKegiatans.kedudukans' => function ($q) {
                    $q->where('is_active', true);
                },
                'subKegiatans.kedudukans.bobotSkkms',
            ])
            ->get();
        return view('mahasiswa.upload-sertifikat', compact('bidangKegiatans'));
    }

    /**
     * Simpan sertifikat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'kedudukan_id' => 'required|exists:kedudukans,id',
            'tingkat' => 'nullable|string|in:perguruan_tinggi,regional,nasional,internasional',
            'tanggal_kegiatan' => 'required|date',
            'penyelenggara' => 'nullable|string|max:255',
            'link_sertifikat' => 'required|url',
        ]);
        

        // Cari bobot berdasarkan kedudukan + tingkat
        $bobot = BobotSkkm::where('kedudukan_id', $request->kedudukan_id)
            ->where('tingkat', $request->tingkat)
            ->value('bobot') ?? 0;
        $tingkat = $request->tingkat ?: null;

        // Simpan ke database
        Sertifikat::create([
            'mahasiswa_id' => session('mahasiswa_id'),
            'kedudukan_id' => $request->kedudukan_id,
            'tingkat' => $tingkat,
            'nama_kegiatan' => $request->nama_kegiatan,
            'penyelenggara' => $request->penyelenggara,
            'tipe_asal' => 'luar_kampus',
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'link_sertifikat' => $request->link_sertifikat,
            'bobot_snapshot' => $bobot,
            'status' => 'pending',
        ]);

        return redirect()->route('sertifikat.index')
            ->with('success', 'Sertifikat berhasil diunggah! Menunggu verifikasi BEM.');
    }
}
