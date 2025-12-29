<?php

use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NoteController;

// Landing page dengan data dinamis dari database
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/landing', [LandingController::class, 'index']);

// Route khusus Community Notes
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');

// Route untuk halaman galeri lama (jika masih diperlukan)
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
