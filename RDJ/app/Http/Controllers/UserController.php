<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $userId = Auth::id();

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'email'
        ]);

        $filteredData = array_filter($validatedData, function ($value) {
            return $value !== null;
        });

        // Retrieve the user from the database
        $user = User::find($userId);

        if ($user) {
            // Update the user attributes with the filtered data
            $user->update($filteredData);
            // $user->update(['name' => $filteredData['firstName'] . " " . $filteredData['lastName']]);
        }
    }

    public function showUpdateProfile() {
        $user = Auth::user();

        return Inertia::render('UpdateProfile', [
            "user" => $user,
        ]);
    }
}
