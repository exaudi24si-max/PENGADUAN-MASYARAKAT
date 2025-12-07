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

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Resource routes
Route::resource('warga', WargaController::class);
Route::resource('users', UserController::class);
Route::resource('laporans', LaporanController::class);

// ==================== PROTECTED ROUTES ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [GuestController::class, 'index'])->name('home');
    Route::get('/index', [GuestController::class, 'index'])->name('home.alternative');
    Route::get('/main', [GuestController::class, 'main'])->name('main');
});
