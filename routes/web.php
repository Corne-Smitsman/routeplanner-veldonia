<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/About-us', [PageController::class, 'about'])->name('about');
Route::get('/Stations', [StationController::class, 'station'])->name('station');
Route::get('/Stations/{station}', [StationController::class, 'detail'])->name('station.detail');
