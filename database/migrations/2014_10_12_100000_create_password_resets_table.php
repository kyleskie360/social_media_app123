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
        Schema::create('password_resets', function (Blueprint $table) {
            // Email field with a maximum length and an index for quick lookups
            $table->string('email', 255)->index();
            
            // Token field with a defined length
            $table->string('token', 255);
            
            // Timestamp for when the reset request was created
            $table->timestamp('created_at')->nullable();

            // Define a composite primary key (email and token) to ensure uniqueness
            $table->primary(['email', 'token']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
