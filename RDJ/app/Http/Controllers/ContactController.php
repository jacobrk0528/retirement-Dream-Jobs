<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return Inertia::render('Contact', [
            "user" => $user,
        ]);
    }
}
