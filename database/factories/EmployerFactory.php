<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>   fake()->company(),
            'logo' => "https://avatar.iran.liara.run/public/" .  $this->faker->unique()->numberBetween(1, 100),
            'user_id' => User::factory(),
        ];
    }
}
