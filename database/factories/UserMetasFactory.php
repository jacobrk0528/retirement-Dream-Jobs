<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserMetas>
 */
class UserMetasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_results' => json_encode([
                'Question1Answer' => '',
                'Question2Answer' => '',
                'Question3Answer' => '',
                'Question4Answer' => '',
                'Question5Answer' => '',
            ])
        ];
    }
}
