<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            
            $table->string('name')->index(); // Name of the user with an index for faster searches
            
            // Email field with unique constraint and case-insensitive collation (depends on DBMS)
            $table->string('email')->unique()->collation('utf8mb4_unicode_ci'); 
            
            $table->timestamp('email_verified_at')->nullable(); // Nullable timestamp for email verification
            
            // Define a length limit for the password field (hashed passwords)
            $table->string('password', 255);
            
            $table->rememberToken(); // Token for "remember me" functionality
            
            $table->timestamps(); // Created and updated timestamps

            // Adding a unique index for the email column (handled by the unique() method)
            $table->index('email');
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_picture')->nullable();
        });
        
    }
};
