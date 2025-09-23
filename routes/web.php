<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LeaderboardController;

use App\Http\Controllers\AdminUserController;

// Admin users resource route
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
    Route::get('dashboard', [AdminUserController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', AdminUserController::class);
});

// Import route
Route::post('/import', [ImportController::class, 'import'])->name('import')->middleware(['auth', 'admin']);

// ...existing code...
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/question', function () {
    return view('question');
})->middleware(['auth', 'verified'])->name('question');

Route::get('/stats', function () {
    return view('stats');
})->middleware(['auth', 'verified'])->name('stats');

Route::get('/leaderboard', [LeaderboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('leaderboard');

Route::get('/allquestions', function () {
    return view('allquestions');
})->middleware(['auth', 'verified'])->name('allquestions');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Nieuwe route om first_login te updaten wanneer popup wordt gesloten
    Route::post('/disable-first-login', [UserController::class, 'disableFirstLogin'])
        ->name('user.disableFirstLogin');
});

Route::post('/import', [ImportController::class, 'import'])->name('import');

require __DIR__.'/auth.php';
