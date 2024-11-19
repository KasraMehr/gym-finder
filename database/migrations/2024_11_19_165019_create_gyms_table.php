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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id('GymID');
            $table->string('GymName');
            $table->foreignId('GymOwnerID')->references('id')->on('gym_owners');
            $table->text('address')->nullable();
            $table->string('city');
            // TODO: facilities
            $table->string('OpeningHours')->nullable();
            $table->string('ContactInfo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};