<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

$standardAuthMiddleware = ['auth:sanctum', config('jetstream.auth_session'), 'verified'];
$standardAdminMiddleware = array_merge($standardAuthMiddleware, ['admin']);

Route::get('/')
    ->name('home')
    ->uses([IndexController::class, 'show']);

Route::get('/contact')
    ->name('contact')
    ->uses([ContactController::class, 'show']);

Route::middleware($standardAuthMiddleware)
     ->group(base_path('routes/web-profile.php'));

Route::middleware($standardAuthMiddleware)
    ->group(base_path('routes/web-quiz.php'));

Route::middleware($standardAdminMiddleware)
    ->group(base_path('routes/web-admin.php'));

// ------------------ API Routes ------------------ //
Route::post('/send-email', [ContactController::class, 'sendEmail']);