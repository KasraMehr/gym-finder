<?php

use Carbon\Carbon;
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewID');

            $table->unsignedBigInteger('user_ID');

            $table->foreign('user_ID')->references('userID')->on('users')->onDelete('cascade');
            $table->morphs('reviewable');

            $table->decimal('Rating', 2, 1)->default(5);
            $table->text('comment')->nullable();
            $table->timestamp('ReviewDate')->default(Carbon::now());

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
