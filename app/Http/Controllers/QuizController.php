<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuizMail;
use Psy\Formatter\Formatter;
use Carbon\Carbon;


class QuizController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $results = (json_decode($user->quiz_results));

        return Inertia::render('Quiz', [
            "user" => $user,
            "results" => $results
        ]);
    }

    public function setup() {
        $user = Auth::user();

        $existingData = json_decode($user->quiz_results, true);

        if ($existingData == null){
            $existingData['Question1Answer'] = '';
            $existingData['Question2Answer'] = '';
            $existingData['Question3Answer'] = '';
            $existingData['Question4Answer'] = '';
            $existingData['Question5Answer'] = '';

            $newData = json_encode($existingData);

            $user->quiz_results = $newData;

            $user->save();
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $results = json_decode($user->quiz_results);

        if ($request->input('question') == 1){
            $results->Question1Answer = $request->input('answer');
        } else if ($request->input('question') == 2){
            $results->Question2Answer = $request->input('answer');
        } else if ($request->input('question') == 3){
            $results->Question3Answer = $request->input('answer');
        } else if ($request->input('question') == 4){
            $results->Question4Answer = $request->input('answer');
        } else if ($request->input('question') == 5){
            $results->Question5Answer = $request->input('answer');
        }

        $user->quiz_results = json_encode($results);
        $user->save();
    }

    public function getAnswer(Request $request)
    {
        $user = Auth::user();
        $results = json_decode($user->quiz_results);

        if ($request->input('question') == 1){
            return $results->Question1Answer;
        } else if ($request->input('question') == 2){
            return $results->Question2Answer;
        } else if ($request->input('question') == 3){
            return $results->Question3Answer;
        } else if ($request->input('question') == 4){
            return $results->Question4Answer;
        } else if ($request->input('question') == 5){
            return $results->Question5Answer;
        }

        return $results->Question1Answer;
    }

    public function isCompleted() {
        $user = Auth::user();
        $completedData = [
            "completed" => !!$user->quiz_completed,
            'completed_at' => Carbon::parse($user->quiz_completed_at)->format('d / m / Y')
        ];
        return $completedData;
    }

    public function submitQuiz() {
        $user = Auth::user();

        // mark user as completed
        $user->quiz_completed = true;

        // save timestamp
        $user->updated_at = now();
        $user->save();

        // get user's quiz results
        $results = json_decode($user->quiz_results, true);
        $userDetails = [
            'name' => $user->name,
            'email' => $user->email
        ];

	// send email to admin
	// Mail::to('example@email.com')
	//	->send(new QuizMail($results, $userDetails));
    }
}
