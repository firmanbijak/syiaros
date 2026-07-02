<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\PlaybookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SituationController;
use App\Http\Controllers\Syiar\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/syiar', [HomeController::class, 'index'])->name('syiar.index');
Route::get('/syiar/start', [HomeController::class, 'start'])->name('syiar.start');

Route::resource('products', ProductController::class);
Route::resource('journeys', JourneyController::class);
Route::resource('situations', SituationController::class);
Route::resource('playbooks', PlaybookController::class);
Route::resource('assets', AssetController::class);
