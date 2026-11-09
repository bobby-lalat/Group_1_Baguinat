<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            // The student is a row in the users table (change here if the team makes a students table).
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();

            // The event comes from the events module's table.
            $table->unsignedBigInteger('event_id');

            $table->string('status', 20)->default('present'); // present, late, absent
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();

            // One attendance record per student per event.
            $table->unique(['student_id', 'event_id']);
            $table->index('event_id');

            // Link to events only if that table already exists when this migration runs.
            if (Schema::hasTable('events')) {
                $table->foreign('event_id')->references('id')->on('events')->cascadeOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
