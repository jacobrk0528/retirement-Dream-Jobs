<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class resumeController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $fileName = $user->name . '_resume.pdf';

        $request->file->move(public_path('storage/resumes/'), $fileName);

        $user->resume_path = $fileName;
        $user->updated_at = Carbon::now();
        $user->save();
    }


    public function downloadResume($userId)
    {
        $user = User::findOrFail($userId);


        $filePath = public_path('storage/resumes/' . $user->resume_path);

        if (file_exists($filePath)) {
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="'.$user->resume_path.'"',
            ];
            return response()->file($filePath, $headers);
        } else {
            abort(404, 'File not found.');
        }
    }

    public function isUploaded($userId) {
        $user = User::findOrFail($userId);
        if ($user->resume_path != null) {
            return response()->json(['uploaded' => true, "uploaded_at" => Carbon::parse($user->updated_at)->format('d / m / Y')]);
        } else {
            return response()->json(['uploaded' => false]);
        }
    }


}
