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
            $table->unsignedBiginteger('AthleteID')->unsigned();
            $table->unsignedBiginteger('GymOwnerID')->unsigned();

            $table->foreign('AthleteID')->references('id')
                ->on('athletes')->onDelete('cascade');
            $table->foreign('GymOwnerID')->references('id')
                ->on('gym_owners')->onDelete('cascade');
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

