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
        Schema::create('classes', function (Blueprint $table) {
            $table->foreignId('GymID')->constrained('gyms')->onDelete('cascade');
            $table->foreignId('CoachID')->constrained('coaches')->onDelete('cascade');
            $table->foreignId('SportID')->constrained('sports')->onDelete('cascade');

            $table->string('className');
            // TODO: schedule
            $table->float('duration');
            $table->integer('price');
            $table->integer('MaxParticipants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
