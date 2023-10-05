<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    // SHOW USER PROFILE UPDATE PAGE
    public function showUpdateProfile() {
        $user = Auth::user();

        return Inertia::render('UpdateProfile', [
            "user" => $user,
        ]);
    }

    // SHOW OTHER USER PROFILE
    public function showOtherProfile(int $id) {
        $user = User::find($id);

        // AT SOME POINT MAKE AN ERROR MESSAGE FOR THIS
        if (!$user) {
            return redirect()->route('home');
        }

        return Inertia::render('Profile', [
            "user" => $user,
            "metas" => $user->metas ? $user->metas : null,
            "visitingProfile" => Auth::user(),
        ]);
    }

    // SHOW USER PROFILE
    public function show()
    {
        $user = Auth::user();


        return Inertia::render('Profile', [
            "user" => $user,
            "metas" => $user->metas ? $user->metas : null,
            "successMessage" => null
        ]);
    }
    public function showSuccess()
    {
        $user = Auth::user();

        return Inertia::render('Profile', [
            "user" => $user,
            "successMessage" => "Successfully submited quiz!"
        ]);
    }

    // ELEVATE USER TO ADMIN
    public function elevate(User $user) {
        $user->role = "admin";
        $user->save();
    }

    // DESTROY USER
    public function destroy(User $user)
    {
        if($user->role != 'admin') {
            $user->delete();
        }
    }
}
