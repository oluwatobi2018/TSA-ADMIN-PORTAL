<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed the Users table (using the UserSeeder)
        $this->call(UserSeeder::class);
        
        // Seed the Contacts table (using the ContactSeeder)
        $this->call(ContactSeeder::class);
    }
}
