<?php

namespace Database\Seeders;

use App\Models\Kedudukan;
use App\Models\SubKegiatan;
use App\Models\BobotSkkm;
use App\Models\User;
use Illuminate\Database\Seeder;

class BobotSkkmSeeder extends Seeder
{
    public function run(): void
    {
        // ambil user kemahasiswaan sebagai updated_by
        $kemahasiswaan = User::where('role', 'kemahasiswaan')->first();
        $userId = $kemahasiswaan ? $kemahasiswaan->id : 1;

        // Format:
        // 'Sub Kegiatan' => [
        //     'Kedudukan' => [pt, regional, nasional, internasional]
        //     'Kedudukan' => null  ← untuk yang tidak ada tingkatan
        // ]
        $data = [

            // ── Akademik & Ilmiah ──────────────────────────────
            'Konfrensi' => [
                'Penulis Utama' => [3, 4, 5, 6],
                'Penyaji'       => [3, 4, 5, 6],
                'Moderator'     => [3, 4, 5, 6],
            ],
            'Memiliki Karya Tulis Ilmiah' => [
                'Perorangan'       => [4, 5, 5, 6],
                'Ketua Kelompok'   => [3, 4, 4, 5],
                'Anggota Kelompok' => [2, 3, 3, 4],
            ],
            'Proposal PKM' => [
                'Submit Proposal PKM' => [2, null, null, null],
                'Lolos Proposal PKM'  => [null, null, 4, null],
            ],
            'Publish Penelitian' => [
                'Ketua'   => [3, 4, 5, 6],
                'Anggota' => [2, 3, 4, 5],
            ],
            'Seminar / Workshop / Talkshow' => [
                'Peserta' => [2, 2, 3, 3],
            ],
            'Kuliah Industri' => [
                'Peserta' => [2, null, null, null],
            ],
            'Kepanitiaan' => [
                'Ketua'   => [4, 5, 6, 8],
                'Anggota' => [3, 3, 4, 6],
            ],

            // ── Minat Bakat, Seni & Olahraga ──────────────────
            'Lomba' => [
                'Juara 1'          => [4, 5, 6, 7],
                'Juara 2'          => [3, 4, 5, 6],
                'Juara 3'          => [3, 4, 5, 6],
                'Harapan / Favorit'=> [3, 4, 5, 6],
                'Peserta'          => [2, 3, 4, 5],
            ],
            'Festival / Pentas Seni / Musik / Olahraga' => [
                'Juri'         => [3, 4, 4, 5],
                'Pengisi Acara'=> [2, 2, 3, 4],
                'Partisipasi'  => [1, 1, 1, 2],
            ],

            // ── Organisasi & Sosial ────────────────────────────
            // has_tingkat = false → semua pakai tingkat null
            'BEM / DPM' => [
                'Presma / Ketua DPM'    => [10, null, null, null],
                'Wakil'                 => [8,  null, null, null],
                'Sekretaris'            => [5,  null, null, null],
                'Bendahara'             => [5,  null, null, null],
                'Mentri / Ketua Komisi' => [5,  null, null, null],
                'Anggota / Staf'        => [4,  null, null, null],
            ],
            'HIMAPRODI / HIMAS / UKM' => [
                'Ketua'       => [5, null, null, null],
                'Wakil'       => [4, null, null, null],
                'Sekretaris'  => [3, null, null, null],
                'Bendahara'   => [3, null, null, null],
                'Koordinator' => [3, null, null, null],
                'Anggota'     => [3, null, null, null],
            ],
            'BAKSOS' => [
                'Peserta' => [2, 2, 3, 4],
            ],

            // ── Kegiatan Wajib ─────────────────────────────────
            // has_tingkat = false → pakai tingkat null
            'G.M.T.I' => [
                'Peserta' => [2, null, null, null],
                'Lulus'   => [2, null, null, null],
            ],
            'Rangkaian Dies Natalis' => [
                'Lulus'   => [2, null, null, null],
            ],
            'Pentas Musik' => [
                'Peserta' => [2, 3, 4, 5],
            ],
            'Peningkatan Soft Skill' => [
                'Peserta' => [2, 3, 4, 5],
            ],
            'Career Week' => [
                'Peserta' => [2, 3, 4, 5],
            ],
        ];

        $tingkats = [
            'perguruan_tinggi',
            'regional',
            'nasional',
            'internasional',
        ];

        foreach ($data as $namaSubKegiatan => $kedudukans) {
            $sub = SubKegiatan::where('nama_sub', $namaSubKegiatan)->first();

            if (!$sub) {
                $this->command->warn("⚠️ Sub '{$namaSubKegiatan}' tidak ditemukan, skip.");
                continue;
            }

            foreach ($kedudukans as $namaKedudukan => $bobots) {
                $kedudukan = Kedudukan::where('sub_kegiatan_id', $sub->id)
                    ->where('nama_kedudukan', $namaKedudukan)
                    ->first();

                if (!$kedudukan) {
                    $this->command->warn("⚠️ Kedudukan '{$namaKedudukan}' tidak ditemukan, skip.");
                    continue;
                }

                foreach ($bobots as $index => $bobot) {
                    // skip kalau bobot null
                    if ($bobot === null) continue;

                    // Organisasi & Wajib → tingkat null
                    $tingkat = $sub->has_tingkat
                        ? $tingkats[$index]
                        : null;

                    // skip duplikat (kedudukan tanpa tingkat)
                    $exists = BobotSkkm::where('kedudukan_id', $kedudukan->id)
                        ->where('tingkat', $tingkat)
                        ->exists();

                    if ($exists) continue;

                    BobotSkkm::create([
                        'kedudukan_id' => $kedudukan->id,
                        'tingkat'      => $tingkat,
                        'bobot'        => $bobot,
                        'updated_by'   => $userId,
                    ]);
                }
            }
        }

        $this->command->info('✅ Bobot SKKM selesai dibuat');
    }
}