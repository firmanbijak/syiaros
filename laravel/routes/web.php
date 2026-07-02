<?php

use App\Http\Controllers\JourneyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Syiar\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/syiar', [HomeController::class, 'index']);

Route::resource('products', ProductController::class);
Route::resource('journeys', JourneyController::class);
