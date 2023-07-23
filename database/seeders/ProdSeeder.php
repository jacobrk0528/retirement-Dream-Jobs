<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class ProdSeeder extends Seeder
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
    }
}
