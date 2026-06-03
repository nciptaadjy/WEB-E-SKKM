<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

    // ══════════════════════════════════════════════
    // MICROSOFT OAUTH (Login Mahasiswa)
    // ══════════════════════════════════════════════

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
     * - Cari mahasiswa berdasarkan microsoft_id atau email
     * - Jika belum ada, buat akun baru otomatis
     * - Set session dan redirect ke dashboard
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
            // Coba ekstrak NIM dari email (format: nim@domain.ac.id)
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

        // Update microsoft_id jika belum ada (untuk mahasiswa lama yang match via email)
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

        // Update last_login
        $mahasiswa->update(['last_login' => now()]);

        return redirect()->route('mahasiswa.dashboard');
    }

    /**
     * DUMMY LOGIN (Hanya untuk Development)
     * Mengizinkan login hanya dengan memasukkan NIM (tanpa password/SSO).
     */
    public function dummyLogin(Request $request)
    {
        if (config('app.env') !== 'local') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate(['nim' => 'required|string']);

        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        // Buat dummy user jika belum ada
        if (!$mahasiswa) {
            $mahasiswa = Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => 'Dummy Mahasiswa ' . $request->nim,
                'prodi' => 'Sistem Informasi',
                'fakultas' => 'Bisnis & Teknologi',
                'angkatan' => date('Y'),
                'password' => bcrypt('password'), // Add default password to prevent SQL error
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

    // ══════════════════════════════════════════════
    // LOGIN ADMIN (BEM / Ormawa / Kemahasiswaan)
    // ══════════════════════════════════════════════

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
            'mahasiswa_email',
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
