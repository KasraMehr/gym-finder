<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('payments')->insert([
                'BookingID' => $index,
                'PaymentDate' => $faker->dateTimeThisMonth(),
                'amount' => $faker->numberBetween(10, 100),
                'PaymentStatus' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
