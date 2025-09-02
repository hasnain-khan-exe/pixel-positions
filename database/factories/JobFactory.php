<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-1 month', 'now');
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement(['$40,000', '$60,000 USD', '$80,000 USD - $100,000 USD', '$100,000 USD+']),
            'location' => 'Remote',
            'schedule' => 'Full time',
            'url' => fake()->url,
            'featured' => false,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
            'expired_at' => (clone $createdAt)->modify('+2 weeks'),

        ];
    }
}
