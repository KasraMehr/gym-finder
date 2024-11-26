<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

   public function up(): void
   {
      Schema::create('gym_facilities', function (Blueprint $table) {
         $table->id('FacilityID');
         $table->string('name');
         $table->text('description')->nullable();

          $table->unsignedBigInteger('GymID');

          $table->foreign('GymID')->references('GymID')->on('gyms')->onDelete('cascade');
      });
   }


   public function down(): void
   {
      Schema::dropIfExists('gym_facilities');
   }
};
