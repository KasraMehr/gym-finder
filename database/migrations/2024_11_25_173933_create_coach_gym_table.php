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
            $table->foreignId('CoachID')->constrained('coaches')->onDelete('cascade');
            $table->foreignId('GymID')->constrained('gyms')->onDelete('cascade');

            $table->primary(['CoachID', 'GymID']);

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
