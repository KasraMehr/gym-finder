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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id('CoachID');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to Users
            $table->json('Specialties')->nullable(); // Specialties like "Bodybuilding," "Yoga"
            $table->json('Certifications')->nullable(); // JSON for holding multiple certifications
            $table->integer('ExperienceYears')->nullable(); // Number of years of experience
            $table->decimal('Rating', 2, 1)->default(5); // Coach rating (e.g., 4.5)
            $table->string('documents_honors')->nullable(); // ex: gold medal in 1998 and coaching document
            // TODO: blogs
            // TODO: tutorials
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
