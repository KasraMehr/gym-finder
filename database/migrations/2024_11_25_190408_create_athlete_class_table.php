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
        Schema::create('athlete_class', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('AthleteID');
            $table->unsignedBigInteger('ClassID');

            $table->foreign('AthleteID')->references('AthleteID')->on('athletes')->onDelete('cascade');
            $table->foreign('ClassID')->references('ClassID')->on('classes')->onDelete('cascade');

            $table->unique(['AthleteID', 'ClassID']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athlete_class');
    }
};
