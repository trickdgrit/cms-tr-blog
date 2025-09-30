<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;

// Halaman Utama
Route::get('/', [PortalController::class, 'index'])->name('portal.index');

// Halaman Detail Data
Route::get('/portal/kependudukan', [PortalController::class, 'kependudukan'])->name('portal.kependudukan');
Route::get('/portal/pendidikan', [PortalController::class, 'pendidikan'])->name('portal.pendidikan');
Route::get('/portal/kesehatan', [PortalController::class, 'kesehatan'])->name('portal.kesehatan');

// Halaman Berita/Blog
Route::get('/berita', [PortalController::class, 'blogIndex'])->name('portal.blog.index');
Route::get('/berita/{post:slug}', [PortalController::class, 'showPost'])->name('portal.blog.show');

