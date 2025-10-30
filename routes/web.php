<?php
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [GaleriController::class, 'index']);