<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardRTController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Admin dashboard (bisa dibatasi role)
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    // laporan management (admin)
    Route::get('/laporan', [LaporanController::class,'index'])->name('laporan.index');
    Route::post('/laporan/{laporan}/status', [LaporanController::class,'updateStatus'])->name('laporan.updateStatus');
});

// Public / warga
Route::get('/lapor-baru', [LaporanController::class,'create'])->name('laporan.create');
Route::post('/lapor-baru', [LaporanController::class,'store'])->name('laporan.store');
Route::get('/terima-kasih', [LaporanController::class,'thanks'])->name('laporan.thanks');

// Chart data endpoint (protected so only admin can call — middleware auth)
Route::get('/chart-data', [DashboardController::class,'chartData'])->middleware('auth')->name('chart.data');

// Tips page
Route::get('/tips', function(){ return view('tips.index'); })->name('tips.index');

// Tips page
Route::get('/tips', function(){ return view('tips.index'); })->name('tips.index');


// Tambahan agar Breeze tidak error saat klik "Profile"
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('landing');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

//manual tanpa email

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset.manual');

//manual tanpa email
Route::get('/reset-success', function () {
    return view('auth.reset-success');
})->name('password.success');

// Halaman dashboard RT (index)
Route::get('/dashboardRT', function () {
    return view('dashboardRT.index'); // <- ini harus index.blade.php
})->name('dashboardRT');

// Halaman tambah laporan
Route::get('/dashboardRT/tambah-laporan', [DashboardRTController::class, 'tambahLaporan'])->name('tambah-laporan');

// Menyimpan laporan
Route::post('/dashboardRT/tambah-laporan', [DashboardRTController::class, 'simpanLaporan'])->name('laporan.simpan');

// Halaman riwayat laporan RT
Route::get('/dashboardRT/riwayat-laporan', function () {
    return view('dashboardRT.riwayat-laporan');
})->name('riwayat-laporan');