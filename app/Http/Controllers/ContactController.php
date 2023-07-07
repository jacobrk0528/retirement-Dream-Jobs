<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return Inertia::render('Contact', [
            "user" => $user,
        ]);
    }

    public function sendEmail(Request $request)
    {
        $formData = $request->all();

        $validator = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ]);

        Mail::to('example@email.com')
            ->send(new ContactMail($formData));

        return redirect()->back()->with('success', 'Thank you for your message. It has been sent.')->withErrors($validator)->withInput();
    }

}
