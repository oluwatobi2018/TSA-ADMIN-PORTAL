<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming a user with ID 1 exists (e.g. the admin user seeded in UserSeeder)
        Contact::create([
            'user_id' => 1,
            'name'    => 'Jane Smith',
            'phone'   => '09098765432',
            'email'   => 'jane.smith@example.com',
        ]);

        Contact::create([
            'user_id' => 1,
            'name'    => 'David Johnson',
            'phone'   => '08054321098',
            'email'   => 'david.johnson@example.com',
        ]);
    }
}
