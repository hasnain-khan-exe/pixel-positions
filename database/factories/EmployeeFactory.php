<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'qualification'=>fake()->randomElement(['Bachelor', 'Master', 'MPhil', 'PhD']),
            'experience'=>fake()->randomNumber(15) . " Years",
            'user_id' => User::factory(),
        ];
    }
}
