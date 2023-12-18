<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTime();

        return [
            'name' => fake()->name(),
            'surname' => fake()->lastName(),
            'login' => fake()->unique()->text(6),
            'birthday' => fake()->optional()->dateTimeBetween( '-40 years', '-20 years'),
            'registration_date' => $date,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
