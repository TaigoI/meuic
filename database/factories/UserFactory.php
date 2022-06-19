<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = User::class;

    public function definition()
    {
        return [
            'ID' => $this->faker->numberBetween(1,99),
            'email' => $this->faker->unique()->safeEmail(),
            'matricula' => $this->faker->numberBetween(1,99),
            'name' => $this->faker->name(),
            'picture' => $this->faker->name(),
            'user_role' => $this->faker->name(),
            
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}