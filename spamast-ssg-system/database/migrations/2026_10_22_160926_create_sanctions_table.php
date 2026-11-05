<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up(): void
    {
        Schema::create('sanctions', function (Blueprint $table) {
            $table->id();

            $table->string('student_id', 50);
            $table->string('student_name');
            $table->string('event_name');
            $table->string('sanction_type');
            $table->text('reason')->nullable();
            $table->date('sanction_date')->nullable();

            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanctions');
    }
};
