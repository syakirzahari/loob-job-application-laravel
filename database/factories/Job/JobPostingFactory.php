<?php

namespace Database\Factories\Job;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobPostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->text(),
            'salary' => '2000',
            'is_active' => 1,
            'start_date' => '2025-09-18',
            'end_date' => '2025-09-25',
        ];
    }
}
