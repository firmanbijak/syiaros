<?php

use App\Http\Controllers\Syiar\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/syiar', [HomeController::class, 'index']);
