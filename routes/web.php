<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;

// ==================== PUBLIC ROUTES ====================
Route::get('/', [GuestController::class, 'beranda'])->name('beranda');
Route::get('/tentang', [GuestController::class, 'tentang'])->name('tentang');
Route::get('/layanan', [GuestController::class, 'layanan'])->name('layanan');

// warga
Route::resource('warga', WargaController::class);

// user
Route::resource('users', UserController::class);

// laporan
Route::resource('laporans', LaporanController::class);





// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// // routes pelanggan
// Route::resource('pelanggan', PelangganController::class);

// ==================== PROTECTED ROUTES ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [GuestController::class, 'index'])->name('home');
    Route::get('/index', [GuestController::class, 'index'])->name('home.alternative');
    Route::get('/main', [GuestController::class, 'main'])->name('main');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


