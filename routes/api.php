<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes', [NoteController::class, 'index']);
