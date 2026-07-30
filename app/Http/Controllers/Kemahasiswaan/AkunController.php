<?php

namespace App\Http\Controllers\Kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Tampilkan halaman manajemen akun
     */
    public function manageAkun()
    {
        $users = User::whereIn('role', ['bem', 'ormawa', 'kemahasiswaan'])
            ->orderBy('role')
            ->orderBy('nama_pengguna')
            ->paginate(15);

        return view('Kemahasiswaan.manage-akun', compact('users'));
    }

    /**
     * Tambah akun baru
     */
    public function storeAkun(Request $request)
    {
        $request->validate([
            'username'      => 'required|string|max:50|unique:users,username',
            'nama_pengguna' => 'required|string|max:100',
            'password'      => 'required|string|min:6',
            'role'          => 'required|in:bem,ormawa,kemahasiswaan',
        ]);

        User::create([
            'username'      => $request->username,
            'nama_pengguna' => $request->nama_pengguna,
            'password'      => Hash::make($request->password),
            'role'          => $request->role,
        ]);

        return back()->with('success', "Akun {$request->role} berhasil dibuat!");
    }

    /**
     * Hapus akun
     */
    public function deleteAkun(User $user)
    {
        if (!in_array($user->role, ['bem', 'ormawa', 'kemahasiswaan'])) {
            return back()->with('error', 'Tidak dapat menghapus akun ini.');
        }

        if ($user->id === Auth::id()) {
            return back()->with('error', 'Tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();
        return back()->with('success', 'Akun berhasil dihapus.');
    }

    /**
     * Reset password akun
     */
    public function resetPassword(Request $request, User $user)
    {
        if (!in_array($user->role, ['bem', 'ormawa', 'kemahasiswaan'])) {
            return back()->with('error', 'Tidak dapat mereset password akun ini.');
        }

        $request->validate([
            'new_password' => 'required|string|min:6',
        ]);

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', "Password untuk {$user->nama_pengguna} berhasil direset.");
    }
}
