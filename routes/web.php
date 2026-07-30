<?php

use App\Http\Controllers\Auth\MahasiswaAuthController;
use App\Http\Controllers\Auth\AdminAuthController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\Api\DropdownController;
use App\Http\Controllers\BemController;

use App\Http\Controllers\Kemahasiswaan\DashboardController as KemahasiswaanDashboard;
use App\Http\Controllers\Kemahasiswaan\VerifikasiController as KemahasiswaanVerifikasi;
use App\Http\Controllers\Kemahasiswaan\AkunController;
use App\Http\Controllers\Kemahasiswaan\PointSkkmController;

use App\Http\Controllers\OrmawaController;

// ══════════════════════════════════════════════
// LOGIN ROUTES
// ══════════════════════════════════════════════

// Mahasiswa Login (Microsoft OAuth)
Route::get('/', [MahasiswaAuthController::class, 'showLogin'])->name('login');
Route::get('/auth/microsoft', [MahasiswaAuthController::class, 'redirectToMicrosoft'])->name('login.microsoft');
Route::get('/auth/microsoft/callback', [MahasiswaAuthController::class, 'handleMicrosoftCallback'])->name('login.microsoft.callback');
Route::post('/login/dummy', [MahasiswaAuthController::class, 'dummyLogin'])->name('login.dummy'); // For development only
Route::post('/logout', [MahasiswaAuthController::class, 'logout'])->name('logout');

// Admin Login (BEM / Ormawa / Kemahasiswaan)
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('login.admin');
Route::post('/admin/login', [AdminAuthController::class, 'authenticate'])->name('login.admin.authenticate');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('logout.admin');


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

    // Berita Event
    Route::get('/events', [DashboardController::class, 'events'])->name('mahasiswa.events');
});


// ══════════════════════════════════════════════
// API & PUBLIC (Butuh login mahasiswa)
// ══════════════════════════════════════════════
Route::middleware(['mahasiswa.auth'])->prefix('mahasiswa')->group(function () {
    Route::get('/api/sub-kegiatan/{bidangId}', [DropdownController::class, 'getSubKegiatan']);
    Route::get('/api/kedudukan/{subId}', [DropdownController::class, 'getKedudukan']);
    Route::get('/api/bobot/{kedudukanId}/{tingkat?}', [DropdownController::class, 'getBobot']);
});

// ══════════════════════════════════════════════
// PANDUAN ROUTES (Terbuka untuk mahasiswa)
// ══════════════════════════════════════════════
Route::middleware(['mahasiswa.auth'])->prefix('panduan')->group(function () {
    Route::get('/', [PanduanController::class, 'index'])->name('panduan');
    Route::get('/tentang-skkm', [PanduanController::class, 'tentangSkkm'])->name('panduan.tentang-skkm');
    Route::get('/bobot-skkm', [PanduanController::class, 'bobotSkkm'])->name('panduan.bobot-skkm');
    Route::get('/alur-pengajuan', [PanduanController::class, 'alurPengajuan'])->name('panduan.alur-pengajuan');
});


// ══════════════════════════════════════════════
// BEM ROUTES (Laravel Auth + role middleware)
// ══════════════════════════════════════════════
Route::middleware(['auth', 'role:bem'])->prefix('bem')->group(function () {

    Route::get('/dashboard', [BemController::class, 'index'])->name('bem.dashboard');
    Route::get('/verifikasi', [BemController::class, 'verifikasi'])->name('bem.verifikasi');
    Route::get('/riwayat', [BemController::class, 'riwayat'])->name('bem.riwayat');
    Route::post('/verifikasi/{sertifikat}/approve', [BemController::class, 'approve'])->name('bem.approve');
    Route::post('/verifikasi/{sertifikat}/reject', [BemController::class, 'reject'])->name('bem.reject');
});

// ══════════════════════════════════════════════
// KEMAHASISWAAN ROUTES
// ══════════════════════════════════════════════
Route::middleware(['auth', 'role:kemahasiswaan'])->prefix('kemahasiswaan')->group(function () {

    Route::get('/dashboard', [KemahasiswaanDashboard::class, 'index'])->name('kemahasiswaan.dashboard');
    Route::get('/verifikasi', [KemahasiswaanVerifikasi::class, 'verifikasi'])->name('kemahasiswaan.verifikasi');
    Route::get('/riwayat', [KemahasiswaanVerifikasi::class, 'riwayat'])->name('kemahasiswaan.riwayat');
    Route::post('/verifikasi/{sertifikat}/approve', [KemahasiswaanVerifikasi::class, 'approve'])->name('kemahasiswaan.approve');
    Route::post('/verifikasi/{sertifikat}/reject', [KemahasiswaanVerifikasi::class, 'reject'])->name('kemahasiswaan.reject');

    // Account Management
    Route::get('/akun', [AkunController::class, 'manageAkun'])->name('kemahasiswaan.akun');
    Route::post('/akun', [AkunController::class, 'storeAkun'])->name('kemahasiswaan.akun.store');
    Route::delete('/akun/{user}', [AkunController::class, 'deleteAkun'])->name('kemahasiswaan.akun.delete');
    Route::post('/akun/{user}/reset-password', [AkunController::class, 'resetPassword'])->name('kemahasiswaan.akun.reset-password');


    // Point Management
    Route::get('/manage-point/{bidang?}', [PointSkkmController::class, 'managePoint'])->name('kemahasiswaan.point');
    Route::post('/bobot/{bobot}/update', [PointSkkmController::class, 'updateBobot'])->name('kemahasiswaan.bobot.update');
    Route::post('/bidang/{bidang}/update', [PointSkkmController::class, 'updateBidang'])->name('kemahasiswaan.bidang.update');
    Route::post('/bidang', [PointSkkmController::class, 'storeBidang'])->name('kemahasiswaan.bidang.store');
    Route::delete('/bidang/{bidang}', [PointSkkmController::class, 'deleteBidang'])->name('kemahasiswaan.bidang.delete');
    Route::post('/sub-kegiatan', [PointSkkmController::class, 'storeSubKegiatan'])->name('kemahasiswaan.sub.store');
    Route::post('/sub-kegiatan/{sub}/update', [PointSkkmController::class, 'updateSubKegiatan'])->name('kemahasiswaan.sub.update');
    Route::delete('/sub-kegiatan/{sub}', [PointSkkmController::class, 'deleteSubKegiatan'])->name('kemahasiswaan.sub.delete');

    Route::post('/kedudukan', [PointSkkmController::class, 'storeKedudukan'])->name('kemahasiswaan.kedudukan.store');
    Route::post('/kedudukan/{kedudukan}/update', [PointSkkmController::class, 'updateKedudukan'])->name('kemahasiswaan.kedudukan.update');
    Route::delete('/kedudukan/{kedudukan}', [PointSkkmController::class, 'deleteKedudukan'])->name('kemahasiswaan.kedudukan.delete');
});


// ══════════════════════════════════════════════
// ORMAWA ROUTES (placeholder)
// ══════════════════════════════════════════════
Route::middleware(['auth', 'role:ormawa'])->prefix('ormawa')->group(function () {
    Route::get('/dashboard', [OrmawaController::class, 'index'])->name('ormawa.dashboard');

    // Event Management (Berita)
    Route::get('/events', [OrmawaController::class, 'events'])->name('ormawa.events');
    Route::get('/events/create', [OrmawaController::class, 'createEvent'])->name('ormawa.events.create');
    Route::post('/events', [OrmawaController::class, 'storeEvent'])->name('ormawa.events.store');
    Route::delete('/events/{event}', [OrmawaController::class, 'deleteEvent'])->name('ormawa.events.delete');
});

