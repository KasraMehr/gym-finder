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
        Schema::create('gym_owners', function (Blueprint $table) {
            $table->id('GymOwnerID');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to Users
            $table->string('GymName')->nullable(); // Gym name for the gym owner
            $table->timestamps();
            $table->string('facalities')->nullable(); // the facalities that gym has
            //TODO: add rating
            $table->foreignId('GymID')->constrained('users')->onDelete('cascade'); // has many gyms
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_owners');
    }
};
