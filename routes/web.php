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

    // Berita Event
    Route::get('/events', [DashboardController::class, 'events'])->name('mahasiswa.events');
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

    // Account Management
    Route::get('/akun', [KemahasiswaanController::class, 'manageAkun'])->name('kemahasiswaan.akun');
    Route::post('/akun', [KemahasiswaanController::class, 'storeAkun'])->name('kemahasiswaan.akun.store');
    Route::delete('/akun/{user}', [KemahasiswaanController::class, 'deleteAkun'])->name('kemahasiswaan.akun.delete');
    Route::post('/akun/{user}/reset-password', [KemahasiswaanController::class, 'resetPassword'])->name('kemahasiswaan.akun.reset-password');

    // Batch Penomoran Approval
    Route::get('/batch-penomoran', [KemahasiswaanController::class, 'batchPenomoran'])->name('kemahasiswaan.batch');
    Route::post('/batch-penomoran/{batch}/approve', [KemahasiswaanController::class, 'approveBatch'])->name('kemahasiswaan.batch.approve');
    Route::post('/batch-penomoran/{batch}/reject', [KemahasiswaanController::class, 'rejectBatch'])->name('kemahasiswaan.batch.reject');

    // Point Management
    Route::get('/manage-point', [KemahasiswaanController::class, 'managePoint'])->name('kemahasiswaan.point');
    Route::post('/bobot/{bobot}/update', [KemahasiswaanController::class, 'updateBobot'])->name('kemahasiswaan.bobot.update');
    Route::post('/bidang/{bidang}/update', [KemahasiswaanController::class, 'updateBidang'])->name('kemahasiswaan.bidang.update');
    Route::post('/bidang', [KemahasiswaanController::class, 'storeBidang'])->name('kemahasiswaan.bidang.store');
    Route::delete('/bidang/{bidang}', [KemahasiswaanController::class, 'deleteBidang'])->name('kemahasiswaan.bidang.delete');
    Route::post('/sub-kegiatan', [KemahasiswaanController::class, 'storeSubKegiatan'])->name('kemahasiswaan.sub.store');
    Route::post('/sub-kegiatan/{sub}/update', [KemahasiswaanController::class, 'updateSubKegiatan'])->name('kemahasiswaan.sub.update');
    Route::delete('/sub-kegiatan/{sub}', [KemahasiswaanController::class, 'deleteSubKegiatan'])->name('kemahasiswaan.sub.delete');
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

    // CSV Upload Peserta
    Route::get('/events/{event}/peserta', [OrmawaController::class, 'showUploadPeserta'])->name('ormawa.peserta');
    Route::post('/events/{event}/peserta/upload', [OrmawaController::class, 'uploadPeserta'])->name('ormawa.peserta.upload');

    // Batch Penomoran
    Route::get('/batch-penomoran', [OrmawaController::class, 'batchPenomoran'])->name('ormawa.batch');
    Route::post('/batch-penomoran', [OrmawaController::class, 'storeBatchPenomoran'])->name('ormawa.batch.store');
});
