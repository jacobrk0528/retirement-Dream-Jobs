<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->afterCreating(function (User $user) {
            $user->metas()->create([
                'user_id' => $user->id,
                'quiz_results' => json_encode([
                    "Are you ready to being the quiz?" => "Morning",
                    "What time of day do you feel most productive?" => "It doesn't matter to me",
                    "How do you prefer to work with others?" => "I have no preference",
                    "Which work environment appeals to you the most?" => "Indoors",
                    "How do you handle challenges in a work setting?" => "Analyze and strategize solutions",
                    "What motivates you in a job?" => "Opportunities for creativity and innovation",
                    "Which of these interests you the most?" => "Technology and Innovation",
                    "How important is work-life balance to you?" => "Extremely important; it's a top priority",
                    "Are you willing to undergo training or education for a new career?" => "Yes; I'm eager to learn and adapt",
                    "What are your preferred working hours?" => "Full-time",
                    "How important is social interaction in your ideal job?" => "Very important",
                ]),
                'phone' => '8434762438',
                'dob' => '05/28/2004',
            ]);
        })->create([
            'name' => 'Jacob Krebs',
            'role' => 'admin',
            'email' => 'jacob@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        User::factory()->afterCreating(function (User $user) {
            $user->metas()->create([
                'user_id' => $user->id,
                'quiz_completed' => true,
                'quiz_completed_at' => now(),
                'quiz_results' => json_encode([
                    "Are you ready to being the quiz?" => "Morning",
                    "What time of day do you feel most productive?" => "It doesn't matter to me",
                    "How do you prefer to work with others?" => "I have no preference",
                    "Which work environment appeals to you the most?" => "Indoors",
                    "How do you handle challenges in a work setting?" => "Analyze and strategize solutions",
                    "What motivates you in a job?" => "Opportunities for creativity and innovation",
                    "Which of these interests you the most?" => "Technology and Innovation",
                    "How important is work-life balance to you?" => "Extremely important; it's a top priority",
                    "Are you willing to undergo training or education for a new career?" => "Yes; I'm eager to learn and adapt",
                    "What are your preferred working hours?" => "Full-time",
                    "How important is social interaction in your ideal job?" => "Very important",
                ]),
                
            ]);
        })->count(100)->create();
    }
}
