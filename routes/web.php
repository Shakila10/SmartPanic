<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardRTController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\DashboardWargaController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth'])->group(function () {
//     // Admin dashboard (bisa dibatasi role)
//     Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

//     // laporan management (admin)
//     Route::get('/laporan', [LaporanController::class,'index'])->name('laporan.index');
//     Route::post('/laporan/{laporan}/status', [LaporanController::class,'updateStatus'])->name('laporan.updateStatus');
// });

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


// require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('landing');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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
Route::get('/dashboardRT/riwayat-laporan', [LaporanController::class, 'riwayat'])->name('riwayat-laporan');
// Halaman edukasi & tips darurat RT
Route::get('/dashboardRT/edukasi-tips', function () {
    return view('dashboardRT.edukasi-tips');
})->name('edukasi-tips');

// Halaman dashbiard warga (index)
Route::get('/dashboardWarga', function () {
    return view('dashboardWarga.index'); // <- ini harus index.blade.php
})->name('dashboardWarga');

// Halaman edukasi & tips darurat Warga
Route::get('/dashboardWarga/edukasi-tips-warga', function () {
    return view('dashboardWarga.edukasi-tips-warga');
})->name('edukasi-tips-warga');

// Halaman tambah laporan
Route::get('/dashboardWarga/tambah-laporan-warga', [DashboardWargaController::class, 'tambahLaporan'])->name('tambah-laporan-warga');



//edit profile rt
Route::get('/dashboardRT/profile', function () {
    return view('dashboardRT.profile.profile');
})->name('dashboardRT.profile');

Route::get('/dashboardRT/profile/edit', function () {
    return view('dashboardRT.profile.edit-profile');
})->name('dashboardRT.editProfile');





Route::get('/dashboardWarga/profile', function () {
    return view('dashboardWarga.profile.profile');
})->name('dashboardWarga.profile');

// Route untuk halaman profil di Dashboard RT
Route::get('/dashboardWarga/edit-profile-warga', function () {
    return view('dashboardWarga.profile.edit-profile-warga');
})->name('dashboardWarga.edit-profile');

// Route untuk halaman profil di Dashboard RT
Route::get('/dashboardRT/edit-profile', function () {
    return view('dashboardRT.profile.edit-profile');
})->name('dashboardRT.edit-profile');

//api notifikasi
Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');

