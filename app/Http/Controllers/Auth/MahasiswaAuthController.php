<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class MahasiswaAuthController extends Controller
{
    /**
     * Tampilkan halaman login mahasiswa
     */
    public function showLogin()
    {
        return view('Login.mahasiswa.login');
    }

    /**
     * Redirect ke halaman login Microsoft
     */
    public function redirectToMicrosoft()
    {
        return Socialite::driver('microsoft')
            ->scopes(['User.Read'])
            ->redirect();
    }

    /**
     * Handle callback dari Microsoft OAuth
     */
    public function handleMicrosoftCallback(Request $request)
    {
        try {
            $microsoftUser = Socialite::driver('microsoft')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'login' => 'Gagal login dengan Microsoft. Silakan coba lagi.',
            ]);
        }

        // Cari mahasiswa berdasarkan microsoft_id
        $mahasiswa = Mahasiswa::where('microsoft_id', $microsoftUser->getId())->first();

        // Jika tidak ditemukan, cari berdasarkan email
        if (!$mahasiswa && $microsoftUser->getEmail()) {
            $mahasiswa = Mahasiswa::where('email', $microsoftUser->getEmail())->first();
        }

        // Jika masih tidak ditemukan, buat akun baru
        if (!$mahasiswa) {
            $email = $microsoftUser->getEmail();
            $nimFromEmail = $email ? explode('@', $email)[0] : null;

            $mahasiswa = Mahasiswa::create([
                'nim'          => $nimFromEmail ?? 'MS-' . $microsoftUser->getId(),
                'microsoft_id' => $microsoftUser->getId(),
                'email'        => $email,
                'nama'         => $microsoftUser->getName() ?? 'Mahasiswa',
                'prodi'        => '-',
                'fakultas'     => '-',
                'angkatan'     => date('Y'),
            ]);
        }

        // Update microsoft_id jika belum ada
        if (!$mahasiswa->microsoft_id) {
            $mahasiswa->update([
                'microsoft_id' => $microsoftUser->getId(),
                'email'        => $microsoftUser->getEmail(),
            ]);
        }

        // Simpan data mahasiswa ke session
        session([
            'mahasiswa_id'       => $mahasiswa->id,
            'mahasiswa_nim'      => $mahasiswa->nim,
            'mahasiswa_nama'     => $mahasiswa->nama,
            'mahasiswa_prodi'    => $mahasiswa->prodi,
            'mahasiswa_fakultas' => $mahasiswa->fakultas,
            'mahasiswa_angkatan' => $mahasiswa->angkatan,
            'mahasiswa_email'    => $mahasiswa->email,
        ]);

        $mahasiswa->update(['last_login' => now()]);

        return redirect()->route('mahasiswa.dashboard');
    }

    /**
     * DUMMY LOGIN (Hanya untuk Development)
     */
    public function dummyLogin(Request $request)
    {
        if (config('app.env') !== 'local') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate(['nim' => 'required|string']);

        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        if (!$mahasiswa) {
            $mahasiswa = Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => 'Dummy Mahasiswa ' . $request->nim,
                'prodi' => 'Sistem Informasi',
                'fakultas' => 'Bisnis & Teknologi',
                'angkatan' => date('Y'),
                'password' => bcrypt('password'),
            ]);
        }

        session([
            'mahasiswa_id'       => $mahasiswa->id,
            'mahasiswa_nim'      => $mahasiswa->nim,
            'mahasiswa_nama'     => $mahasiswa->nama,
            'mahasiswa_prodi'    => $mahasiswa->prodi,
            'mahasiswa_fakultas' => $mahasiswa->fakultas,
            'mahasiswa_angkatan' => $mahasiswa->angkatan,
            'mahasiswa_email'    => $mahasiswa->email,
        ]);

        $mahasiswa->update(['last_login' => now()]);

        return redirect()->route('mahasiswa.dashboard');
    }

    /**
     * Logout mahasiswa
     */
    public function logout(Request $request)
    {
        $request->session()->forget([
            'mahasiswa_id',
            'mahasiswa_nim',
            'mahasiswa_nama',
            'mahasiswa_prodi',
            'mahasiswa_fakultas',
            'mahasiswa_angkatan',
            'mahasiswa_email',
        ]);

        return redirect()->route('login');
    }
}
