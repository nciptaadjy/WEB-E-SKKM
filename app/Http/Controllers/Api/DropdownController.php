<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BobotSkkm;
use App\Models\Kedudukan;
use App\Models\SubKegiatan;

class DropdownController extends Controller
{
    /**
     * Ambil sub kegiatan berdasarkan bidang kegiatan ID
     */
    public function getSubKegiatan($bidangId)
    {
        $subs = SubKegiatan::where('bidang_kegiatan_id', $bidangId)
            ->get()
            ->map(fn ($s) => [
                'id' => $s->id,
                'nama_sub' => $s->nama_sub,
                'has_tingkat' => (int) $s->has_tingkat, // ← cast ke int: true→1, false→0
            ]);

        return response()->json($subs);
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
