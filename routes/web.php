<?php

use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/over-veldonia', [PageController::class, 'about'])->name('about');

    Route::get('/steden/{station}/verwijderen', [StationController::class, 'confirmDestroy'])
        ->name('stations.confirm-destroy');
    Route::resource('steden', StationController::class)
        ->parameters(['steden' => 'station'])
        ->names('stations');

    Route::get('/verbindingen/{connection}/verwijderen', [ConnectionController::class, 'confirmDestroy'])
        ->name('connections.confirm-destroy');
    Route::resource('verbindingen', ConnectionController::class)
        ->parameters(['verbindingen' => 'connection'])
        ->names('connections')
        ->except('show');

    Route::get('/profiel', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profiel', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiel', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
