<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName, // Fake username (unique)
            'password' => bcrypt('password'),               // Default password (hashed)
            'full_name' => $this->faker->name,              // Fake full name
            'contact_number' => $this->faker->phoneNumber,  // Fake phone number
            'email' => $this->faker->unique()->safeEmail,   // Fake email (unique)
        ];
    }

    /**
     * Indicate that the user is an admin.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_admin' => true,
            ];
        });
    }

    /**
     * Indicate that the user is a regular user (non-admin).
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function regularUser()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_admin' => false,
            ];
        });
    }
}
