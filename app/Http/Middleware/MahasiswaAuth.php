<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MahasiswaAuth
{
    /**
     * Cek apakah mahasiswa sudah login via session.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('mahasiswa_id')) {
            return redirect()->route('login')->withErrors([
                'login' => 'Silakan login terlebih dahulu.',
            ]);
        }

        return $next($request);
    }
}
