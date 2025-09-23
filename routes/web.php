<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/stats', function () {
    return view('stats');
})->middleware(['auth', 'verified'])->name('stats');

Route::get('/leaderboard', function () {
    return view('leaderboard');
})->middleware(['auth', 'verified'])->name('leaderboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Nieuwe route om first_login te updaten wanneer popup wordt gesloten
    Route::post('/disable-first-login', [UserController::class, 'disableFirstLogin'])
        ->name('user.disableFirstLogin');
});

require __DIR__.'/auth.php';
