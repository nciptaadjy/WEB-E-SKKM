<?php

namespace Database\Seeders;

use App\Models\SubKegiatan;
use App\Models\Kedudukan;
use Illuminate\Database\Seeder;

class KedudukanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ── Akademik & Ilmiah ──────────────────────
            'Konfrensi' => [
                'Penulis Utama', 'Penyaji', 'Moderator',
            ],
            'Memiliki Karya Tulis Ilmiah' => [
                'Perorangan', 'Ketua Kelompok', 'Anggota Kelompok',
            ],
            'Proposal PKM' => [
                'Submit Proposal PKM', 'Lolos Proposal PKM',
            ],
            'Publish Penelitian' => [
                'Ketua', 'Anggota',
            ],
            'Seminar / Workshop / Talkshow' => [
                'Peserta',
            ],
            'Kuliah Industri' => [
                'Peserta',
            ],
            'Kepanitiaan' => [
                'Ketua', 'Anggota',
            ],

            // ── Minat Bakat, Seni & Olahraga ──────────
            'Lomba' => [
                'Juara 1', 'Juara 2', 'Juara 3',
                'Harapan / Favorit', 'Peserta',
            ],
            'Festival / Pentas Seni / Musik / Olahraga' => [
                'Juri', 'Pengisi Acara', 'Partisipasi',
            ],

            // ── Organisasi & Sosial ────────────────────
            'BEM / DPM' => [
                'Presma / Ketua DPM', 'Wakil', 'Sekretaris',
                'Bendahara', 'Mentri / Ketua Komisi', 'Anggota / Staf',
            ],
            'HIMAPRODI / HIMAS / UKM' => [
                'Ketua', 'Wakil', 'Sekretaris',
                'Bendahara', 'Koordinator', 'Anggota',
            ],
            'BAKSOS' => [
                'Peserta',
            ],

            // ── Kegiatan Wajib ─────────────────────────
            'G.M.T.I' => [
                'Peserta', 'Lulus',
            ],
            'Rangkaian Dies Natalis' => [
                'Lulus',
            ],
            'Pentas Musik' => [
                'Peserta',
            ],
            'Peningkatan Soft Skill' => [
                'Peserta',
            ],
            'Career Week' => [
                'Peserta',
            ],
        ];

        foreach ($data as $namaSubKegiatan => $kedudukans) {
            $sub = SubKegiatan::where('nama_sub', $namaSubKegiatan)->first();

            if (!$sub) {
                $this->command->warn("⚠️ Sub kegiatan '{$namaSubKegiatan}' tidak ditemukan, skip.");
                continue;
            }

            foreach ($kedudukans as $namaKedudukan) {
                Kedudukan::create([
                    'sub_kegiatan_id' => $sub->id,
                    'nama_kedudukan'  => $namaKedudukan,
                    'is_active'       => true,
                ]);
            }
        }

        $this->command->info('✅ Kedudukan selesai dibuat');
    }
}