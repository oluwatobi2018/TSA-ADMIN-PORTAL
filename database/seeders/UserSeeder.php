<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin user
        User::create([
            'username'       => 'admin1',
            'password'       => Hash::make('password123'),
            'full_name'      => 'Admin One',
            'contact_number' => '08012345678',
            'email'          => 'admin1@example.com',
        ]);

        // Create a regular user
        User::create([
            'username'       => 'johndoe',
            'password'       => Hash::make('secret123'),
            'full_name'      => 'John Doe',
            'contact_number' => '08123456789',
            'email'          => 'john@example.com',
        ]);
    }
}
