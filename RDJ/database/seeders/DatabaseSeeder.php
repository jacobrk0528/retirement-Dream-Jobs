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
            'firstName' => 'Jacob',
            'middleName' => 'Ryan',
            'lastName' => 'Krebs',
            'email' => 'Jacob@email.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
        ]);
    }
}
