<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SertifikatController;

/* Mahasiswa */
Route::get('/dashboard-mahasiswa', [DashboardController::class, 'index'])->name('dashboard');
Route::get('mahasiswa/upload-sertifikat', [SertifikatController::class, 'create'])->name('sertifikat.create');
Route::get('mahasiswa/list-sertifikat', [DashboardController::class, 'show'])->name('sertifikat.show');
Route::get('mahasiswa/panduan', [SertifikatController::class, 'index'])->name('panduan');

/* Login */
Route::post('Login/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/', [LoginController::class, 'index'])->name('login');


/* BEM */







