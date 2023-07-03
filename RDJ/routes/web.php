<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/')
    ->name('home')
    ->uses([IndexController::class, 'show']);

Route::get('/contact')
    ->name('contact')
    ->uses([ContactController::class, 'show']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard')
        ->name('dashboard')
        ->uses([DashboardController::class, 'show']);

    Route::get('/quiz')
        ->name('quiz')
        ->uses([QuizController::class, 'show']);
});

Route::get('/admin')->name('admin')->uses([AdminController::class, 'show'])->middleware('admin');
Route::get('userProfile/{id}', [UserController::class, 'showProfile'])->name('userProfile')->middleware('admin');


// ------------------ API Routes ------------------ //

// Update User Profile
Route::post('/updateUser', [UserController::class, 'update'])->name('updateUser');

// Send Contact Email
Route::post('/send-email', [ContactController::class, 'sendEmail']);

// Quiz routes
Route::post('/setup-quiz', [QuizController::class, 'setup'])->name('setup-quiz');
Route::get('/get-quiz-answer', [QuizController::class, 'getAnswer'])->name('get-quiz-answer');
Route::post('/submit-quiz', [QuizController::class, 'submitQuiz'])->name('submit-quiz');
Route::post('/update-quiz', [QuizController::class, 'update'])->name('submit-quiz');
Route::get('/quiz-completed', [QuizController::class, 'isCompleted'])->name('quiz-completed');

// Admin routes
Route::get('/sortQuizTableRows', [AdminController::class, 'sortRows'])->name('sortQuizTableRows');
