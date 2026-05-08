<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\BemController;
use App\Http\Controllers\KemahasiswaanController;

use App\Http\Controllers\OrmawaController;

// ══════════════════════════════════════════════
// LOGIN ROUTES
// ══════════════════════════════════════════════

// Mahasiswa Login
Route::get('/', [LoginController::class, 'showLoginMahasiswa'])->name('login');
Route::post('/login', [LoginController::class, 'authenticateMahasiswa'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logoutMahasiswa'])->name('logout');

// Admin Login (BEM / Ormawa / Kemahasiswaan)
Route::get('/admin/login', [LoginController::class, 'showLoginAdmin'])->name('login.admin');
Route::post('/admin/login', [LoginController::class, 'authenticateAdmin'])->name('login.admin.authenticate');
Route::post('/admin/logout', [LoginController::class, 'logoutAdmin'])->name('logout.admin');


// ══════════════════════════════════════════════
// MAHASISWA ROUTES (Session-based auth)
// ══════════════════════════════════════════════
Route::middleware('mahasiswa.auth')->prefix('mahasiswa')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('mahasiswa.dashboard');

    // Sertifikat
    Route::get('/sertifikat/upload', [SertifikatController::class, 'create'])->name('sertifikat.create');
    Route::post('/sertifikat/upload', [SertifikatController::class, 'store'])->name('sertifikat.store');
    Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');

    // Panduan
    Route::get('/panduan', [SertifikatController::class, 'panduan'])->name('panduan');
    Route::get('/mahasiswa/panduan/tentang-skkm', [SertifikatController::class, 'tentangSkkm'])->name('panduan.tentang-skkm');
    Route::get('/mahasiswa/panduan/bobot-skkm', [SertifikatController::class, 'bobotSkkm'])->name('panduan.bobot-skkm');

    // API: Ambil sub kegiatan berdasarkan bidang
    Route::get('/api/sub-kegiatan/{bidangId}', [SertifikatController::class, 'getSubKegiatan'])->name('api.sub-kegiatan');
    Route::get('/api/kedudukan/{subId}', [SertifikatController::class, 'getKedudukan'])->name('api.kedudukan');
    Route::get('/api/bobot/{kedudukanId}/{tingkat?}', [SertifikatController::class, 'getBobot'])->name('api.bobot');
});


// ══════════════════════════════════════════════
// BEM ROUTES (Laravel Auth + role middleware)
// ══════════════════════════════════════════════
Route::middleware(['auth', 'role:bem'])->prefix('bem')->group(function () {

    Route::get('/dashboard', [BemController::class, 'index'])->name('bem.dashboard');
    Route::get('/verifikasi', [BemController::class, 'verifikasi'])->name('bem.verifikasi');
    Route::post('/verifikasi/{sertifikat}/approve', [BemController::class, 'approve'])->name('bem.approve');
    Route::post('/verifikasi/{sertifikat}/reject', [BemController::class, 'reject'])->name('bem.reject');
});


// ══════════════════════════════════════════════
// KEMAHASISWAAN ROUTES
// ══════════════════════════════════════════════
Route::middleware(['auth', 'role:kemahasiswaan'])->prefix('kemahasiswaan')->group(function () {

    Route::get('/dashboard', [KemahasiswaanController::class, 'index'])->name('kemahasiswaan.dashboard');
    Route::get('/verifikasi', [KemahasiswaanController::class, 'verifikasi'])->name('kemahasiswaan.verifikasi');
    Route::post('/verifikasi/{sertifikat}/approve', [KemahasiswaanController::class, 'approve'])->name('kemahasiswaan.approve');
    Route::post('/verifikasi/{sertifikat}/reject', [KemahasiswaanController::class, 'reject'])->name('kemahasiswaan.reject');
});


// ══════════════════════════════════════════════
// ORMAWA ROUTES (placeholder)
// ══════════════════════════════════════════════
Route::middleware(['auth', 'role:ormawa'])->prefix('ormawa')->group(function () {
    Route::get('/dashboard', [OrmawaController::class, 'index'])->name('ormawa.dashboard');
});
