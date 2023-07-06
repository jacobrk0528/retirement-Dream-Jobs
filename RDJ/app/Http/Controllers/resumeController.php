<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class resumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('resumeUpload');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $fileName = $user->name . '_resume.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $fileName);

        $user->resume_path = $fileName;
        $user->save();
    }
}
