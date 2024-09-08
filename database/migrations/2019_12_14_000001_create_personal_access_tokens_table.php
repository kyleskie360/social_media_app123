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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            
            // Morphs columns to support polymorphic relationships
            $table->morphs('tokenable');
            
            // Token name with a maximum length of 255 characters
            $table->string('name', 255);
            
            // Token string with a length of 64 characters, unique index for performance
            $table->string('token', 64)->unique()->index();
            
            // Abilities field with nullable text type
            $table->text('abilities')->nullable();
            
            // Timestamp for when the token was last used, nullable
            $table->timestamp('last_used_at')->nullable();
            
            // Timestamp for token expiration, nullable
            $table->timestamp('expires_at')->nullable();
            
            // Default timestamps (created_at and updated_at)
            $table->timestamps();
            
            // Optional: Adding an index on `expires_at` for efficient querying by expiration date
            $table->index('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
