<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KependudukanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\SaranaPrasaranaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat Anda mendaftarkan semua rute untuk bagian
| dashboard admin. Semua rute di file ini secara otomatis akan
| memiliki prefix '/admin' dan dilindungi oleh middleware 'auth'.
|
*/

// Redirect dari /admin ke /admin/dashboard
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Rute Dashboard Utama - nama diubah menjadi admin.dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Rute CRUD untuk setiap modul
Route::resource('kependudukan', KependudukanController::class)->names('admin.kependudukan');
Route::resource('pendidikan', PendidikanController::class)->names('admin.pendidikan');
Route::resource('kesehatan', KesehatanController::class)->names('admin.kesehatan');
Route::resource('anggaran', AnggaranController::class)->names('admin.anggaran');
Route::resource('sarana', SaranaPrasaranaController::class)->names('admin.sarana');
Route::resource('blog', BlogController::class)->names('admin.blog');

// Rute untuk Menu Pengaturan
Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('admin.pengaturan.index');
Route::put('/pengaturan', [PengaturanController::class, 'update'])->name('admin.pengaturan.update');

// Rute Profile bawaan Breeze (juga diproteksi)
Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
