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
            $table->unsignedBiginteger('AthleteID')->unsigned();
            $table->unsignedBiginteger('CoachID')->unsigned();

            $table->foreign('AthleteID')->references('id')
                ->on('athletes')->onDelete('cascade');
            $table->foreign('CoachID')->references('id')
                ->on('coaches')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athelet_coach');
    }
};
