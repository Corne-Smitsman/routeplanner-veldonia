<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/About-us', [PageController::class, 'about'])->name('about');

Route::get('/Stations', [StationController::class, 'station'])->name('station');
Route::get('/Stations/create', [StationController::class, 'create'])->name('station.create')->middleware('auth');
Route::get('/Stations/{station}/edit', [StationController::class, 'edit'])->name('station.edit')->middleware('auth');
Route::get('/Stations/{station}/delete', [StationController::class, 'confirmDelete'])->name('station.delete')->middleware('auth');
Route::post('/Stations', [StationController::class, 'store'])->name('station.store')->middleware('auth');
Route::get('/Stations/{station}', [StationController::class, 'detail'])->name('station.detail');
Route::put('/Stations/{station}', [StationController::class, 'update'])->name('station.update')->middleware('auth');
Route::delete('/Stations/{station}', [StationController::class, 'destroy'])->name('station.destroy')->middleware('auth');

Route::get('/Connections', [ConnectionController::class, 'connection'])->name('connection');
Route::get('/Connections/create', [ConnectionController::class, 'create'])->name('connection.create')->middleware('auth');
Route::get('/Connections/{connection}/edit', [ConnectionController::class, 'edit'])->name('connection.edit')->middleware('auth');
Route::get('/Connections/{connection}/delete', [ConnectionController::class, 'confirmDelete'])->name('connection.delete')->middleware('auth');
Route::post('/Connections', [ConnectionController::class, 'store'])->name('connection.store')->middleware('auth');
Route::get('/Connections/{connection}', [ConnectionController::class, 'detail'])->name('connection.detail');
Route::put('/Connections/{connection}', [ConnectionController::class, 'update'])->name('connection.update')->middleware('auth');
Route::delete('/Connections/{connection}', [ConnectionController::class, 'destroy'])->name('connection.destroy')->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
