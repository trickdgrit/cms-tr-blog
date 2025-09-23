<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;

// Halaman Utama
Route::get('/', [PortalController::class, 'index'])->name('portal.index');

// Halaman Detail Kependudukan
Route::get('/portal/kependudukan', [PortalController::class, 'kependudukan'])->name('portal.kependudukan');

// --- BARIS INI YANG MEMPERBAIKI ERROR ---
// Halaman Detail Berita/Blog
Route::get('/berita/{id}', [PortalController::class, 'showPost'])->name('portal.blog.show');

