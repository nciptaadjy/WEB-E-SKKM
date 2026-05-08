<?php

namespace Database\Seeders;

use App\Models\BidangKegiatan;
use Illuminate\Database\Seeder;

class BidangKegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $bidangs = [
            ['nama_bidang' => 'Akademik & Ilmiah',        'is_wajib' => false],
            ['nama_bidang' => 'Minat Bakat, Seni & Olahraga', 'is_wajib' => false],
            ['nama_bidang' => 'Organisasi & Sosial',      'is_wajib' => false],
            ['nama_bidang' => 'Kegiatan Wajib',           'is_wajib' => true],
        ];

        foreach ($bidangs as $bidang) {
            BidangKegiatan::create([
                'nama_bidang' => $bidang['nama_bidang'],
                'is_wajib'    => $bidang['is_wajib'],
                'is_active'   => true,
            ]);
        }

        $this->command->info('✅ Bidang kegiatan selesai dibuat');
    }
}