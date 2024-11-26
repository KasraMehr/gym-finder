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
            $table->id('ClassID');
            $table->unsignedBigInteger('GymID');
            $table->unsignedBigInteger('CoachID');
            $table->unsignedBigInteger('SportID');

            $table->foreign('GymID')->references('GymID')->on('gyms')->onDelete('cascade');
            $table->foreign('CoachID')->references('CoachID')->on('coaches')->onDelete('cascade');
            $table->foreign('SportID')->references('SportID')->on('sports')->onDelete('cascade');

            $table->string('className');
            $table->string('schedule');
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
