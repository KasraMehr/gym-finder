<?php

use Illuminate\Database\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

   public function up(): void
   {
      Schema::create('gym_facalities', function (Blueprint $table) {
         $table->id('FacalityID');
         $table->string('name');
         $table->text('discription')->nullable();

         $table->foreignId('GymID')->refrences('id')->on('gyms');
         });
   }


   public function down(): void
   {
      Schema::dropIfExists('gym_facalities');
   }
};
