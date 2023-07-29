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
use Ramsey\Uuid\Type\Integer;

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

        if (!$results) {
            $results = new \stdClass();
        }

        $questionNumber = $request->input('question');
        $answer = $request->input('answer');
        $question = $this->getQuestion($questionNumber);

        $results->{$question} = $answer;

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
        $question = $this->getQuestion($questionNumber);
        
        if ($questionNumber >= 1 && $questionNumber <= 10) {
            if (isset($results->{$question})) {
                return $results->{$question};
            }
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

    public function getQuestion(int $questionNumber)
    {
        $quizQuestions = [
            0 => "Are you ready to being the quiz?",
            1 => "What time of day do you feel most productive?",
            2 => "How do you prefer to work with others?",
            3 => "Which work environment appeals to you the most?",
            4 => "How do you handle challenges in a work setting?",
            5 => "What motivates you in a job?",
            6 => "Which of these interests you the most?",
            7 => "How important is work-life balance to you?",
            8 => "Are you willing to undergo training or education for a new career?",
            9 => "What are your preferred working hours?",
            10 => "How important is social interaction in your ideal job?",

        ];

        if (isset($quizQuestions[$questionNumber])) {
            return $quizQuestions[$questionNumber];
        } else {
            return 'Invalid question number';
        }
    }
}
