<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Tampilkan halaman login admin (BEM/Ormawa/Kemahasiswaan)
     */
    public function showLogin()
    {
        return view('Login.admin.login');
    }

    /**
     * Proses login admin (BEM/Ormawa/Kemahasiswaan via Laravel Auth)
     */
    public function authenticate(Request $request)
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
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.admin');
    }
}
