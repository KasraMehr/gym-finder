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
            $table->unsignedBigInteger('GymOwnerID');

            $table->foreign('GymOwnerID')->references('GymOwnerID')->on('gym_owners')->onDelete('cascade');

            $table->string('GymName');
            $table->text('address')->nullable();
            $table->string('city');
            $table->decimal('Rating', 2, 1)->default(5);
            $table->string('OpeningHours')->nullable();
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
