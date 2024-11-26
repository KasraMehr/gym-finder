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
        Schema::create('athlete_gym', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('AthleteID');
            $table->unsignedBigInteger('GymID');

            $table->foreign('AthleteID')->references('AthleteID')->on('athletes')->onDelete('cascade');
            $table->foreign('GymID')->references('GymID')->on('gyms')->onDelete('cascade');

            $table->unique(['AthleteID', 'GymID']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athlete_gym');
    }
};

