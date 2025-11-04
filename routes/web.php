<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LaporanController;


Route::get('/', [GuestController::class, 'beranda'])->name('beranda');
Route::get('/tentang', [GuestController::class, 'tentang'])->name('tentang');
Route::get('/laporan', [GuestController::class, 'laporan'])->name('laporan');
Route::get('/layanan', [GuestController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [GuestController::class, 'kontak'])->name('kontak');
Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');


// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// routes pelanggan
Route::resource('pelanggan', PelangganController::class);

// ==================== PROTECTED ROUTES ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [GuestController::class, 'index'])->name('home');
    Route::get('/index', [GuestController::class, 'index'])->name('home.alternative');
    Route::get('/main', [GuestController::class, 'main'])->name('main');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
