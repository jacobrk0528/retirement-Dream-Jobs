<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\resumeController;

Route::get('/profile')
    ->name('profile.show')
    ->uses([UserController::class, 'show']);

Route::get('/profile/success')
    ->name('profile.success')
    ->uses([UserController::class, 'showSuccess']);

Route::get('userProfile/{id}', [UserController::class, 'showOtherProfile'])
    ->name('userProfile')
    ->middleware('admin');

Route::post('/file-upload', [resumeController::class, 'store'])
    ->name('file.store');

Route::get('userProfile/file-download/{userId}', [resumeController::class, 'downloadResume'])
    ->name('file.download')
    ->middleware('admin');
    
Route::get('/file-uploaded/{userId}', [resumeController::class, 'isUploaded'])
    ->name('resume-uploaded');

Route::post('/updateUser', [UserController::class, 'update'])
    ->name('updateUser');

Route::post('/elevateUser/{user}', [UserController::class, 'elevate'])
    ->name('elevateUser')
    ->middleware('admin');

Route::delete('/deleteUser/{user}', [UserController::class, 'destroy'])
    ->name('deleteUser')
    ->middleware('admin');