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
            $table->id('AthleteID');
            $table->unsignedBigInteger('userID')->unsigned();
            $table->unsignedBigInteger('GymID')->unsigned();

            $table->foreignId('user_ID')->constrained('users')->onDelete('cascade'); // Foreign key to Users
            $table->foreignId('GymID')->constrained('gyms');

            $table->json('interests')->nullable(); // Stores an array of sports types or interests
            $table->string('goals')->nullable(); // Goals like "Weight Loss," "Muscle Gain"
            $table->string('honors')->nullable(); // like gold medal in 2009 year
            $table->string('membership_level')->default('free'); // Membership Level: free, premium, etc.
            $table->boolean('hide_profile')->default('ture'); // for more privacy
            $table->enum('age_group', ['minors', 'infants', 'teenagers', 'adults', 'veterans'])->nullable();
            // TODO: favorites (wish list)
            $table->foreignId('coach_id')->constrained('coaches')->onDelete('cascade');
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
