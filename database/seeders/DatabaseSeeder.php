<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MahasiswaSeeder;
use Database\Seeders\BidangKegiatanSeeder;
use Database\Seeders\SubKegiatanSeeder;
use Database\Seeders\KedudukanSeeder;
use Database\Seeders\BobotSkkmSeeder;   

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MahasiswaSeeder::class,
            BidangKegiatanSeeder::class,
            SubKegiatanSeeder::class,
            KedudukanSeeder::class,    // ← harus sebelum BobotSkkm
            BobotSkkmSeeder::class,     // ← paling terakhir
        ]);
    }
}
