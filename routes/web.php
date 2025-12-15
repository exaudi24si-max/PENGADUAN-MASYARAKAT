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

// ==================== PROFIL PENGEMBANG ====================
Route::get('/profil-pengembang', function () {
    return view('pages.profil-pengembang');
})->name('profil.pengembang');

// Authentication routes (SEMUA BISA AKSES)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================== ROUTES KHUSUS ADMIN ====================
// SEMUA ROUTE DI BAWAH INI HANYA BISA DIAKSES OLEH ADMIN
Route::middleware(['check.login'])->group(function () {

    // Resource routes (HANYA ADMIN YANG BISA AKSES)
    Route::resource('warga', WargaController::class);
    Route::resource('users', UserController::class);
    Route::resource('laporans', LaporanController::class);

    // Route khusus admin lainnya
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/laporan', function () {
        return view('admin.laporan');
    })->name('admin.laporan');
});

// ==================== ROUTE TESTING ====================
Route::get('/test-admin-only', function () {
    return 'HALO ADMIN! Hanya kamu yang bisa lihat ini.';
})->middleware(['check.login', 'check.role'])->name('test.admin');

// Dashboard & halaman utama admin
Route::get('/home', [GuestController::class, 'index'])->name('home');
Route::get('/index', [GuestController::class, 'index'])->name('home.alternative');
Route::get('/main', [GuestController::class, 'main'])->name('main');
