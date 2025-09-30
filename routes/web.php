<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

// Admin users resource route
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
    Route::get('dashboard', [AdminUserController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', AdminUserController::class);
});

// Import route
Route::post('/import', [ImportController::class, 'import'])->name('import')->middleware(['auth', 'admin']);

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Toetsen - categorized questions
Route::get('/toetsen/{category_id}', [QuestionController::class, 'showByCategory'])
    ->middleware(['auth', 'verified'])
    ->name('toetsen.category')
    ->where('category_id', '[0-9]+');

// Toetsen - answer submission
Route::post('/toetsen/{category_id}', [QuestionController::class, 'submitAnswer'])
    ->middleware(['auth', 'verified'])
    ->name('toetsen.submit')
    ->where('category_id', '[0-9]+');

// Toetsen - toggle mark question
Route::post('/toetsen/{category_id}/mark', [QuestionController::class, 'toggleMark'])
    ->middleware(['auth', 'verified'])
    ->name('toetsen.mark')
    ->where('category_id', '[0-9]+');

// Toetsen - final submission of entire test
Route::post('/toetsen/{category_id}/finish', [QuestionController::class, 'finishCategoryQuiz'])
    ->middleware(['auth', 'verified'])
    ->name('toetsen.finish')
    ->where('category_id', '[0-9]+');

// Toetsen - result page after finishing
Route::get('/toetsen/{category_id}/result', [QuestionController::class, 'showCategoryResult'])
    ->middleware(['auth', 'verified'])
    ->name('toetsen.result')
    ->where('category_id', '[0-9]+');

// Stats 
Route::get('/stats', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('stats');

// Leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('leaderboard');

// Vragen routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('question.show');
});

// Profiel routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Update first_login
    Route::post('/disable-first-login', [UserController::class, 'disableFirstLogin'])
        ->name('user.disableFirstLogin');
});

require __DIR__.'/auth.php';
