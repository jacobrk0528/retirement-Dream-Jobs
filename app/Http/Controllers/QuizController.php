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
        } else if ($request->input('question') == 6){
            $results->Question6Answer = $request->input('answer');
        } else if ($request->input('question') == 7){
            $results->Question7Answer = $request->input('answer');
        } else if ($request->input('question') == 8){
            $results->Question8Answer = $request->input('answer');
        } else if ($request->input('question') == 9){
            $results->Question9Answer = $request->input('answer');
        } else if ($request->input('question') == 10){
            $results->Question10Answer = $request->input('answer');
        }

        $user->metas()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'quiz_results' => json_encode($results)
            ]
        );
    }

    public function getAnswer(Request $request)
    {
        $user = Auth::user();
        //---------------
        // dd($user->metas->quiz_results);
        $results = json_decode($user->metas->quiz_results);

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
        } else if ($request->input('question') == 6){
            return $results->Question6Answer;
        } else if ($request->input('question') == 7){
            return $results->Question7Answer;
        } else if ($request->input('question') == 8){
            return $results->Question8Answer;
        } else if ($request->input('question') == 9){
            return $results->Question9Answer;
        } else if ($request->input('question') == 10){
            return $results->Question10Answer;
        }

        return 'error';
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
}
