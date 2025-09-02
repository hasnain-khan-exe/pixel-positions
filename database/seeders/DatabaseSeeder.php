<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Employer',
            'email' => 'employer@example.com',
            'user_type' => 'employer',
        ]);

        User::factory()->create([
            'name' => 'Employee',
            'email' => 'employee@example.com',
            'user_type' => 'employee',
        ]);

        $this->call(JobSeeder::class);
    }
}
