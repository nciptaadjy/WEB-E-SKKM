<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\BidangKegiatan;
use App\Models\SubKegiatan;
use App\Models\Kedudukan;
use App\Models\BobotSkkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{
    /**
     * List sertifikat milik mahasiswa yang login
     */
    public function index()
    {
        $mahasiswaId = session('mahasiswa_id');

        // Statistik (query all for counts)
        $allSertifikats = Sertifikat::where('mahasiswa_id', $mahasiswaId)->get();
        $totalPoin = $allSertifikats->where('status', 'approved')->sum('bobot_snapshot');
        $totalApproved = $allSertifikats->where('status', 'approved')->count();
        $totalPending = $allSertifikats->whereIn('status', ['pending', 'verified_bem'])->count();

        // Paginated list
        $sertifikats = Sertifikat::where('mahasiswa_id', $mahasiswaId)
            ->with(['kedudukan.subKegiatan.bidangKegiatan'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

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
        // echo $bidangKegiatans->toJson();
        return view('mahasiswa.upload-sertifikat', compact('bidangKegiatans'));
    }

    /**
     * Simpan sertifikat baru
     */
    public function store(Request $request)
    {
        // dd([
        // 'kedudukan_id' => $request->kedudukan_id,
        // 'tingkat'      => $request->tingkat,
        // 'bobot_query'  => BobotSkkm::where('kedudukan_id', $request->kedudukan_id)
        //                     ->where('tingkat', $request->tingkat)
        //                     ->first(),
        // ]);
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

        $request->validate(['tingkat' => 'nullable|in:perguruan_tinggi,regional,nasional,internasional',]);

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
    /**
     * Halaman panduan — tampilkan tabel bobot SKKM
     */
    public function panduan()
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

    // ══════════════════════════════════════════════
    // API ENDPOINTS (untuk dynamic dropdowns)
    // ══════════════════════════════════════════════

    /**
     * Ambil sub kegiatan berdasarkan bidang kegiatan ID
     */
    public function getSubKegiatan($bidangId)
    {
        $subs = SubKegiatan::where('bidang_kegiatan_id', $bidangId)
        ->get()
        ->map(fn($s) => [
            'id'          => $s->id,
            'nama_sub'    => $s->nama_sub,
            'has_tingkat' => (int) $s->has_tingkat, // ← cast ke int: true→1, false→0
        ]);

        echo $subs->toJson();
        // return response()->json($subs);
    }

    /**
     * Ambil kedudukan berdasarkan sub kegiatan ID
     */
    public function getKedudukan($subId)
    {
        $kedudukans = Kedudukan::where('sub_kegiatan_id', $subId)
            ->where('is_active', true)
            ->select('id', 'nama_kedudukan')
            ->get();

        return response()->json($kedudukans);
    }

    /**
     * Ambil bobot berdasarkan kedudukan ID + tingkat
     */
    public function getBobot($kedudukanId, $tingkat = null)
    {
        $query = BobotSkkm::where('kedudukan_id', $kedudukanId);

        if ($tingkat) {
            $query->where('tingkat', $tingkat);
        }

        $bobots = $query->get();

        return response()->json($bobots);
    }
}
