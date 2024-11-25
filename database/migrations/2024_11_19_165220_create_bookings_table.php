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
            $table->foreignId('ClassID')->constrained('classes')->onDelete('cascade');
            $table->foreignId('AthleteID')->constrained('athletes')->onDelete('cascade');
            $table->foreignId('PaymentID')->constrained('payments')->onDelete('cascade');

            $table->primary(['AthleteID', 'ClassID', 'PaymentID']);
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
