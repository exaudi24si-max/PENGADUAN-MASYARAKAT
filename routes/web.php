<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return view('welcome');
});

// Route::redirect('/', '/pengaduan-masyarakat');
Route::get('/index', [GuestController::class, 'index'])->name('home');
Route::get('/main', [GuestController::class, 'main'])->name('main');
Route::post('/laporan/store', [GuestController::class, 'store'])->name('laporan.store');
