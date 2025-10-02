<?php

// PERBAIKAN: Pastikan semua 'use' statement menggunakan '\'
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

// Rute-rute ini secara otomatis memiliki prefix '/admin' dan dilindungi middleware 'auth'
// seperti yang diatur di RouteServiceProvider.php

// Redirect dari /admin ke /admin/dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Rute Dashboard Utama
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute CRUD untuk setiap modul
Route::resource('kependudukan', KependudukanController::class);
Route::resource('pendidikan', PendidikanController::class);
Route::resource('kesehatan', KesehatanController::class);
Route::resource('anggaran', AnggaranController::class);
Route::resource('sarana', SaranaPrasaranaController::class);
Route::resource('blog', BlogController::class);

// Rute untuk Menu Pengaturan
Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
Route::put('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');

// Rute Profile bawaan Breeze
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
