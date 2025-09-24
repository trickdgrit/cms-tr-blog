<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;

// Halaman Utama
Route::get('/', [PortalController::class, 'index'])->name('portal.index');

// Halaman Detail Kependudukan
Route::get('/portal/kependudukan', [PortalController::class, 'kependudukan'])->name('portal.kependudukan');

// Halaman Detail Pendidikan
Route::get('/portal/pendidikan', [PortalController::class, 'pendidikan'])->name('portal.pendidikan');

// Halaman Detail Kesehatan
Route::get('/portal/kesehatan', [PortalController::class, 'kesehatan'])->name('portal.kesehatan');

// --- BARIS INI YANG MEMPERBAIKI ERROR ---
// Halaman Detail Berita/Blog
Route::get('/berita/{id}', [PortalController::class, 'showPost'])->name('portal.blog.show');

// Halaman Indeks Berita/Blog
Route::get('/berita', [PortalController::class, 'blogIndex'])->name('portal.blog.index');

