<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return Inertia::render('Quiz', [
            "user" => $user,
        ]);
    }
}
