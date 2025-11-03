<?php

use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

// Landing page dengan data dinamis dari database
Route::get('/', [GaleriController::class, 'index'])->name('landing');
Route::get('/landing', [LandingController::class, 'index']);

// Route untuk message dan notes (sama-sama pakai MessageController)
Route::post('/message', [MessageController::class, 'store'])->name('message.store');
Route::get('/messages', [MessageController::class, 'getMessages'])->name('messages.get');

// Route untuk halaman galeri lama (jika masih diperlukan)
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
