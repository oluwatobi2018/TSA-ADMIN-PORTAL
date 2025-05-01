<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key (contact ID)
            $table->unsignedBigInteger('user_id');  // Foreign key reference to users table
            $table->string('name');  // Contact name
            $table->string('phone', 20);  // Contact phone number (up to 20 characters)
            $table->string('email', 100)->nullable();  // Contact email (optional, up to 100 characters)
            $table->enum('contact_type', ['client', 'supplier', 'partner']); // Contact type dropdown
            $table->timestamps();  // Created and updated timestamps

            // Define the foreign key relationship
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
