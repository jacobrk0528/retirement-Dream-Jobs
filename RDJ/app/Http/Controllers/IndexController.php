<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function show()
    {
        return Inertia::render('Welcome', [
            'isAuth' => Auth::check(),
        ]);
    }

}
