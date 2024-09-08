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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            
            // UUID field to uniquely identify each failed job, with an index for performance
            $table->string('uuid', 36)->unique()->index(); 
            
            // Connection and queue fields with text type, assuming they may contain variable-length data
            $table->text('connection');
            $table->text('queue');
            
            // Payload and exception fields with long text types for storing detailed data
            $table->longText('payload');
            $table->longText('exception');
            
            // Timestamp for when the job failed, defaulting to the current time
            $table->timestamp('failed_at')->useCurrent();
            
            // Optionally add indexes on `failed_at` for performance in querying by date
            $table->index('failed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
};
