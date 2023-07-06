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

        User::factory()->create([
            'name' => 'Jacob Krebs',
            'role' => 'admin',
            'email' => 'Jacob@email.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
        ]);
        User::factory()->create([
            'name' => 'Hannah Krebs',
            'role' => 'user',
            'email' => 'Hannah@email.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'quiz_completed' => 1,
            'quiz_results' => json_encode([
                'Question1Answer' => 'Answer1',
                'Question2Answer' => 'Answer2',
                'Question3Answer' => 'Answer1',
                'Question4Answer' => 'Answer2',
                'Question5Answer' => 'Answer1',
            ]),
        ]);
        User::factory()->create([
            'name' => 'Shelley Krebs',
            'role' => 'user',
            'email' => 'Shelley@email.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'quiz_completed' => 1,
            'quiz_results' => json_encode([
                'Question1Answer' => 'Answer1',
                'Question2Answer' => 'Answer2',
                'Question3Answer' => 'Answer1',
                'Question4Answer' => 'Answer2',
                'Question5Answer' => 'Answer1',
            ]),
        ]);
        User::factory()->create([
            'name' => 'Joe Krebs',
            'role' => 'user',
            'email' => 'Joe@email.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'quiz_completed' => 1,
            'quiz_results' => json_encode([
                'Question1Answer' => 'Answer1',
                'Question2Answer' => 'Answer2',
                'Question3Answer' => 'Answer1',
                'Question4Answer' => 'Answer2',
                'Question5Answer' => 'Answer1',
            ]),
        ]);
    }
}
