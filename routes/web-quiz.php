<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/quiz')
    ->name('quiz')
    ->uses([QuizController::class, 'show']);

Route::get('/get-quiz-answer', [QuizController::class, 'getAnswer'])
    ->name('get-quiz-answer');

Route::post('/submit-quiz', [QuizController::class, 'submitQuiz'])
    ->name('submit-quiz');

Route::post('/update-quiz', [QuizController::class, 'update'])
    ->name('submit-quiz');

Route::get('/quiz-completed', [QuizController::class, 'isCompleted'])
    ->name('quiz-completed');

Route::get('/show-Quiz-Results/{user}')
    ->name('showQuizResults')
    ->uses([QuizController::class, 'showResults'])
    ->middleware('admin');

Route::get('/get-quiz-question/{questionNumber}')
    ->name('getQuizQuestion')
    ->uses([QuizController::class, 'getQuestion']);