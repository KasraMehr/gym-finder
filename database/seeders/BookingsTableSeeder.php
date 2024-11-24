<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookingsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('bookings')->insert([
                'AthleteID' => $faker->numberBetween(1, 10),
                'ClassID' => $faker->numberBetween(1, 20),
                'BookingDate' => $faker->dateTimeThisYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
