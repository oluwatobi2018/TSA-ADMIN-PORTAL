<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key (user ID)
            $table->string('username')->unique();  // Unique username for the user
            $table->string('password');  // Password (hashed)
            $table->string('full_name');  // Full name of the user
            $table->string('contact_number', 20)->nullable();  // Optional contact number
            $table->string('email')->unique();  // Unique email address for the user
            $table->string('role')->default('user'); // User role, default is 'user'
            $table->rememberToken(); // Optional for authentication
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
