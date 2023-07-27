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
                    'Question1Answer' => '',
                    'Question2Answer' => '',
                    'Question3Answer' => '',
                    'Question4Answer' => '',
                    'Question5Answer' => '',
                    'Question6Answer' => '',
                    'Question7Answer' => '',
                    'Question8Answer' => '',
                    'Question9Answer' => '',
                    'Question10Answer' => '',
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
                    'Question1Answer' => '1',
                    'Question2Answer' => '2',
                    'Question3Answer' => '3',
                    'Question4Answer' => '4',
                    'Question5Answer' => '5',
                    'Question6Answer' => '6',
                    'Question7Answer' => '7',
                    'Question8Answer' => '8',
                    'Question9Answer' => '9',
                    'Question10Answer' => '10',
                ]),
                
            ]);
        })->count(100)->create();
    }
}
