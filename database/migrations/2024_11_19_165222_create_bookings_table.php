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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('BookingID');
            $table->unsignedBigInteger('ClassID');
            $table->unsignedBigInteger('AthleteID');
            $table->unsignedBigInteger('PaymentID');

            $table->foreign('ClassID')->references('ClassID')->on('classes')->onDelete('cascade');
            $table->foreign('AthleteID')->references('AthleteID')->on('athletes')->onDelete('cascade');
            $table->foreign('PaymentID')->references('PaymentID')->on('payments')->onDelete('cascade');

            $table->unique(['AthleteID', 'ClassID', 'PaymentID']);
            $table->timestamp('BookingDate')->default(Carbon::now());
            // TODO: attendance
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
