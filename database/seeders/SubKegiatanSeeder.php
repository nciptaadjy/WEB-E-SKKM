<?php

namespace Database\Seeders;

use App\Models\BidangKegiatan;
use App\Models\SubKegiatan;
use Illuminate\Database\Seeder;

class SubKegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ── Akademik & Ilmiah ──────────────────────
            'Akademik & Ilmiah' => [
                ['nama_sub' => 'Konfrensi',                    'has_tingkat' => true],
                ['nama_sub' => 'Memiliki Karya Tulis Ilmiah',  'has_tingkat' => true],
                ['nama_sub' => 'Proposal PKM',                 'has_tingkat' => false],
                ['nama_sub' => 'Publish Penelitian',           'has_tingkat' => true],
                ['nama_sub' => 'Seminar / Workshop / Talkshow','has_tingkat' => true],
                ['nama_sub' => 'Kuliah Industri',              'has_tingkat' => false],
                ['nama_sub' => 'Kepanitiaan',                  'has_tingkat' => true],
            ],

            // ── Minat Bakat, Seni & Olahraga ──────────
            'Minat Bakat, Seni & Olahraga' => [
                ['nama_sub' => 'Lomba',                        'has_tingkat' => true],
                ['nama_sub' => 'Festival / Pentas Seni / Musik / Olahraga', 'has_tingkat' => true],
                ['nama_sub' => 'Kepanitiaan',                  'has_tingkat' => true],
            ],

            // ── Organisasi & Sosial ────────────────────
            'Organisasi & Sosial' => [
                ['nama_sub' => 'BEM / DPM',                    'has_tingkat' => false],
                ['nama_sub' => 'HIMAPRODI / HIMAS / UKM',      'has_tingkat' => false],
                ['nama_sub' => 'BAKSOS',                       'has_tingkat' => true],
            ],

            // ── Kegiatan Wajib ─────────────────────────
            'Kegiatan Wajib' => [
                ['nama_sub' => 'G.M.T.I',                      'has_tingkat' => false],
                ['nama_sub' => 'Rangkaian Dies Natalis',       'has_tingkat' => false],
                ['nama_sub' => 'Pentas Musik',                 'has_tingkat' => true],
                ['nama_sub' => 'Peningkatan Soft Skill',       'has_tingkat' => true],
                ['nama_sub' => 'Career Week',                  'has_tingkat' => true],
            ],
        ];

        foreach ($data as $namaBidang => $subs) {
            $bidang = BidangKegiatan::where('nama_bidang', $namaBidang)->first();

            foreach ($subs as $sub) {
                SubKegiatan::create([
                    'bidang_kegiatan_id' => $bidang->id,
                    'nama_sub'           => $sub['nama_sub'],
                    'has_tingkat'        => $sub['has_tingkat'],
                    'is_active'          => true,
                ]);
            }
        }

        $this->command->info('✅ Sub kegiatan selesai dibuat');
    }
}