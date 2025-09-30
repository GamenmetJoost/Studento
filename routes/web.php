<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

// ------------------------
// Admin routes
// ------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
    Route::get('dashboard', [AdminUserController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', AdminUserController::class);
});

// ------------------------
// Import routes
// ------------------------
Route::post('/import', [ImportController::class, 'import'])
    ->middleware(['auth', 'admin'])
    ->name('import');

// ------------------------
// Homepage
// ------------------------
Route::get('/', function () {
    return view('welcome');
});

// ------------------------
// Dashboard / Stats
// ------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/stats', [DashboardController::class, 'index'])->name('stats');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

    // ------------------------
    // Toetsen - categorized questions
    // ------------------------
    Route::prefix('toetsen')->group(function () {
        Route::get('{category_id}', [QuestionController::class, 'showByCategory'])
            ->name('toetsen.category')
            ->where('category_id', '[0-9]+');

        Route::post('{category_id}', [QuestionController::class, 'submitAnswer'])
            ->name('toetsen.submit')
            ->where('category_id', '[0-9]+');

        Route::post('{category_id}/mark', [QuestionController::class, 'toggleMark'])
            ->name('toetsen.mark')
            ->where('category_id', '[0-9]+');

        Route::post('{category_id}/finish', [QuestionController::class, 'finishCategoryQuiz'])
            ->name('toetsen.finish')
            ->where('category_id', '[0-9]+');

        Route::get('{category_id}/result', [QuestionController::class, 'showCategoryResult'])
            ->name('toetsen.result')
            ->where('category_id', '[0-9]+');
    });

    // ------------------------
    // Questions routes
    // ------------------------
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('question.show');

    // ------------------------
    // Profile routes
    // ------------------------
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ------------------------
    // First login / categorieën opslaan
    // ------------------------
    Route::post('/disable-first-login', [UserController::class, 'disableFirstLogin'])
        ->name('user.disableFirstLogin');
});

require __DIR__.'/auth.php';
