<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login mahasiswa
     */
    public function showLoginMahasiswa()
    {
        return view('Login.mahasiswa.login');
    }

    /**
     * Tampilkan halaman login admin (BEM/Ormawa/Kemahasiswaan)
     */
    public function showLoginAdmin()
    {
        return view('Login.admin.login');
    }

    /**
     * Proses login mahasiswa (NIM + Password)
     */
    public function authenticateMahasiswa(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);

        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        if (!$mahasiswa || !Hash::check($request->password, $mahasiswa->password)) {
            return back()->withErrors([
                'login' => 'NIM atau password salah.',
            ])->withInput(['nim' => $request->nim]);
        }

        // Simpan data mahasiswa ke session
        session([
            'mahasiswa_id' => $mahasiswa->id,
            'mahasiswa_nim' => $mahasiswa->nim,
            'mahasiswa_nama' => $mahasiswa->nama,
            'mahasiswa_prodi' => $mahasiswa->prodi,
            'mahasiswa_fakultas' => $mahasiswa->fakultas,
            'mahasiswa_angkatan' => $mahasiswa->angkatan,
        ]);

        // Update last_login
        $mahasiswa->update(['last_login' => now()]);

        return redirect()->route('mahasiswa.dashboard');
    }

    /**
     * Proses login admin (BEM/Ormawa/Kemahasiswaan via Laravel Auth)
     */
    public function authenticateAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect berdasarkan role
            return match ($user->role) {
                'bem' => redirect()->route('bem.dashboard'),
                'ormawa' => redirect()->route('ormawa.dashboard'),
                'kemahasiswaan' => redirect()->route('kemahasiswaan.dashboard'),
                default => redirect()->route('login.admin'),
            };
        }

        return back()->withErrors([
            'login' => 'Username atau password salah.',
        ])->withInput(['username' => $request->username]);
    }

    /**
     * Logout mahasiswa
     */
    public function logoutMahasiswa(Request $request)
    {
        $request->session()->forget([
            'mahasiswa_id',
            'mahasiswa_nim',
            'mahasiswa_nama',
            'mahasiswa_prodi',
            'mahasiswa_fakultas',
            'mahasiswa_angkatan',
        ]);

        return redirect()->route('login');
    }

    /**
     * Logout admin
     */
    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.admin');
    }
}
