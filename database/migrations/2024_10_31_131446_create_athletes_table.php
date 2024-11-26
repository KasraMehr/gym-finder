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
        Schema::create('athletes', function (Blueprint $table) {
            $table->id('AthleteID'); // Primary key
            $table->unsignedBigInteger('user_ID');

            $table->foreign('user_ID')->references('userID')->on('users')->onDelete('cascade');
            $table->json('interests')->nullable();
            $table->string('goals')->nullable();
            $table->string('honors')->nullable();
            $table->string('membership_level')->default('free');
            $table->boolean('hide_profile')->default(false);
            $table->enum('age_group', ['minors', 'infants', 'teenagers', 'adults', 'veterans'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletes');
    }
};
