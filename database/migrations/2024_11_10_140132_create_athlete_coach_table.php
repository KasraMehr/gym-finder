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
        Schema::create('athlete_coach', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('AthleteID');
            $table->unsignedBigInteger('CoachID');

            $table->foreign('AthleteID')->references('AthleteID')->on('athletes')->onDelete('cascade');
            $table->foreign('CoachID')->references('CoachID')->on('coaches')->onDelete('cascade');

            $table->unique(['AthleteID', 'CoachID']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athlete_coach');
    }
};
