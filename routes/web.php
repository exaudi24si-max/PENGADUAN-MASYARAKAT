<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

// ==================== PUBLIC ROUTES ====================

// Welcome page tersedia di URL khusus
Route::get('/welcome', function () {
    return view('welcome');
});

// Root redirect ke login , ini saat di akses ke url nya langsung ke haalaman login saya
Route::redirect('/', '/login');

// Authentication routes , aktivitas login dan regist
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// TAMBAHKIN INI: Route Logout GET (DI LUAR MIDDLEWARE)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

// ==================== PROTECTED ROUTES ====================

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [GuestController::class, 'index'])->name('home');
    Route::get('/index', [GuestController::class, 'index'])->name('home.alternative');
    Route::get('/main', [GuestController::class, 'main'])->name('main');
    Route::post('/laporan/store', [GuestController::class, 'store'])->name('laporan.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 
});
