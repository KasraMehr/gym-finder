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
        Schema::create('coach_gym', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CoachID');
            $table->unsignedBigInteger('GymID');

            $table->foreign('CoachID')->references('CoachID')->on('coaches')->onDelete('cascade');
            $table->foreign('GymID')->references('GymID')->on('gyms')->onDelete('cascade');

            $table->unique(['CoachID', 'GymID']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coach_gym');
    }
};
