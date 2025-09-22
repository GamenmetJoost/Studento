<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


use App\Http\Controllers\AdminUserController;

// Admin users resource route
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
    Route::get('dashboard', [AdminUserController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', AdminUserController::class);
});

// ...existing code...
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
});

require __DIR__.'/auth.php';
