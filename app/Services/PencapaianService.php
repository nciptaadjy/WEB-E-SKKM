<?php

namespace App\Services;

use App\Models\Sertifikat;
use App\Models\Pencapaian;
use App\Models\PencapaianDetail;

class PencapaianService
{
    /**
     * Menambahkan poin ke dalam pencapaian mahasiswa berdasarkan sertifikat yang disetujui.
     *
     * @param Sertifikat $sertifikat
     * @return void
     */
    public function tambahPoin(Sertifikat $sertifikat)
    {
        $pencapaian = Pencapaian::firstOrCreate([
            'mahasiswa_id' => $sertifikat->mahasiswa_id,
        ]);

        $bidangId = $sertifikat->kedudukan
            ->subKegiatan
            ->bidangKegiatan
            ->id;

        $detail = PencapaianDetail::firstOrCreate([
            'pencapaian_id'      => $pencapaian->id,
            'bidang_kegiatan_id' => $bidangId,
        ]);

        $detail->increment('total_poin', $sertifikat->bobot_snapshot);

        $pencapaian->update([
            'total_keseluruhan' => $pencapaian->details->sum('total_poin'),
        ]);
    }
}
