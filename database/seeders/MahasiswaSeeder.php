<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mhs1 = Mahasiswa::create([
            'nim' => '2105101001',
            'nama' => 'Adrian Putra',
            'password' => Hash::make('password'),
            'prodi' => 'Teknik Informatika',
            'fakultas' => 'Fakultas Teknik',
            'angkatan' => 2021,
        ]);

        $mhs2 = Mahasiswa::create([
            'nim' => '2105101002',
            'nama' => 'Siti Rahmawati',
            'password' => Hash::make('password'),
            'prodi' => 'Sistem Informasi',
            'fakultas' => 'Fakultas Teknik',
            'angkatan' => 2022,
        ]);

        $mhs3 = Mahasiswa::create([
            'nim' => '2105101003',
            'nama' => 'Dimas Prayoga',
            'password' => Hash::make('password'),
            'prodi' => 'Ilmu Hukum',
            'fakultas' => 'Fakultas Hukum',
            'angkatan' => 2021,
        ]);
    }
}
