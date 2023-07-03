<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class AdminController extends Controller
{
    public function show()
    {
        $users = $this->getRows();

        return Inertia::render('Admin', [
            'users' => $users,
        ]);
    }

    public function sortRows(Request $request) {
        $users = User::where('quiz_completed', 1)->orderBy($request->input('sort'), $request->input('direction'))->get();
        $data = [
            'users' => $users,
            'sort' => $request->input('sort'),
            'direction' => $request->input('direction')
        ];
        return $data;
    }

    private function getRows() {
        $users = User::where('quiz_completed', 1)->get();

        return $users;
    }
}
