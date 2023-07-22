<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/admin')
    ->name('admin')
    ->uses([AdminController::class, 'show'])
    ->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin');

Route::get('/sortQuizTableRows', [AdminController::class, 'sortRows'])
    ->name('sortQuizTableRows')
    ->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin');
    
Route::get('/searchQuizTableRows', [AdminController::class, 'search'])
    ->name('searchQuizTableRows')
    ->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin');