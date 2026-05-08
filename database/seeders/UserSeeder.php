<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $kemahasiswaan = User::create([
            'username'      => 'kemahasiswaan',
            'nama_pengguna' => 'surya',
            'password'      => Hash::make('password'),
            'role'          => 'kemahasiswaan',
        ]);

        $bem = User::create([
            'username'      => 'admin_bem',
            'nama_pengguna' => 'nining',
            'password'      => Hash::make('password'),
            'role'          => 'bem',
        ]);

        $ormawa = User::create([
            'username'      => 'admin_ormawa',
            'nama_pengguna' => 'RADE',
            'password'      => Hash::make('password'),
            'role'          => 'ormawa',
        ]);

        $this->command->info('✅ User selesai dibuat');
    }
}