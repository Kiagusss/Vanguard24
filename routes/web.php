<?php

use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

// Landing page dengan data dinamis dari database
Route::get('/', [GaleriController::class, 'index'])->name('landing');
Route::get('/landing', [LandingController::class, 'index']);

// Route untuk form message
Route::post('/message', [MessageController::class, 'store'])->name('message.store');

// Route untuk halaman galeri lama (jika masih diperlukan)
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
