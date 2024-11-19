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
            $table->unsignedBiginteger('AthleteID')->unsigned();
            $table->unsignedBiginteger('ClassID')->unsigned();

            $table->foreign('AthleteID')->references('id')
                ->on('athletes')->onDelete('cascade');
            $table->foreign('ClassID')->references('id')
                ->on('classes')->onDelete('cascade');
            $table->timestamp('BookingDate')->default(Carbon::now());
            $table->boolean('PaymentStatus');
            // TODO: attendance associated table.
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
