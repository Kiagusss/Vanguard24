<?php

use App\Http\Controllers\MessageController;

Route::post('/messages', [MessageController::class, 'store']);
Route::get('/messages', [MessageController::class, 'getMessages']);
