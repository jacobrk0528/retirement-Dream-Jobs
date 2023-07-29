<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class AdminController extends Controller
{
    public function show()
    {
        $users = $this->getRows()->load('metas');

        return Inertia::render('Admin', [
            'users' => $users,
        ]);
    }

    public function sortRows(Request $request) {
        $users = User::whereHas('metas', function ($query) {
            $query->where('quiz_completed', 1);
        })
        ->where('name', 'LIKE', '%' . $request->input('search') . '%')
        ->orderBy($request->input('sort'), $request->input('direction'))
        ->get();
    
        $data = [
            'users' => $users,
            'sort' => $request->input('sort'),
            'direction' => $request->input('direction'),
            'search' => $request->input('search')
        ];
        return $data;
    }

    public function search(Request $request) {
        $users = User::whereHas('metas', function ($query) {
            $query->where('quiz_completed', 1);
        })
        ->where('name', 'LIKE', '%' . $request->input('search') . '%')
        ->get();

        $data = [
            'users' => $users,
            'search' => $request->input('search')
        ];
        return $data;
    }

    private function getRows() {
        $users = User::whereHas('metas', function ($query) {
            $query->where('quiz_completed', 1);
        })->get();

        return $users;
    }
}
