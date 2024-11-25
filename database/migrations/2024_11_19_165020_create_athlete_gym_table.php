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
            $table->foreignId('AthleteID')->constrained('athletes')->onDelete('cascade');
            $table->foreignId('GymID')->constrained('gyms')->onDelete('cascade');

            $table->primary(['AthleteID', 'GymID']);

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

