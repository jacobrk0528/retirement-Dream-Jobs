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
            "metas" => $user->metas ? $user->metas : null,
            "results" => $results
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $results = json_decode($user->metas->quiz_results);
    
        $questionNumber = $request->input('question');
        $answer = $request->input('answer');
        $results->{"Question{$questionNumber}Answer"} = $answer;
    
        $user->metas()->updateOrCreate(
            ['user_id' => $user->id],
            ['quiz_results' => json_encode($results)]
        );
    }
    

    public function getAnswer(Request $request)
    {
        $user = Auth::user();
        $results = json_decode($user->metas->quiz_results);
        $questionNumber = $request->input('question');
        
        // Check if the question number is within the valid range (1 to 10)
        if ($questionNumber >= 1 && $questionNumber <= 10) {
            return $results->{"Question{$questionNumber}Answer"};
        }
    
        return '';
    }
    

    public function isCompleted() {
        $user = Auth::user();
        $completedData = [
            "completed" => !!$user->metas->quiz_completed,
            'completed_at' => Carbon::parse($user->metas->quiz_completed_at)->format('m / d / Y')
        ];
        return $completedData;
    }

    public function submitQuiz() {
        $user = Auth::user();

        // mark user as completed
        $user->metas->quiz_completed = true;
        $user->metas->quiz_completed_at = now();
        $user->metas->save();

        // get user's quiz results
        $results = json_decode($user->metas->quiz_results, true);
        $userDetails = [
            'name' => $user->name,
            'email' => $user->email
        ];

        // send email to admin
        // Mail::to('example@email.com')
        //	->send(new QuizMail($results, $userDetails));
    }

    public function showResults(User $user) {

        $user = $user->load('metas');

        return Inertia::render('QuizResults', [
            "user" => $user,
        ]);
    }
}
