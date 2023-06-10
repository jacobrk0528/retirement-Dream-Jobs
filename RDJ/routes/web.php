<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// POST
Route::post('/updateUser', [UserController::class, 'update'])->name('updateUser');