<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/quiz')
    ->name('quiz')
    ->uses([QuizController::class, 'show'])
    ->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified',);

Route::get('/get-quiz-answer', [QuizController::class, 'getAnswer'])
    ->name('get-quiz-answer')
    ->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified',);

Route::post('/submit-quiz', [QuizController::class, 'submitQuiz'])
    ->name('submit-quiz')
    ->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified',);

Route::post('/update-quiz', [QuizController::class, 'update'])
    ->name('submit-quiz')
    ->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified',);

Route::get('/quiz-completed', [QuizController::class, 'isCompleted'])
    ->name('quiz-completed')
    ->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified',);
