<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),  // Create a user for this contact
            'name' => $this->faker->name,              // Fake name
            'phone' => $this->faker->phoneNumber,      // Fake phone number
            'email' => $this->faker->safeEmail,        // Fake email address
        ];
    }
}
