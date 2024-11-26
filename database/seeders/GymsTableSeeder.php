<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('gyms')->insert([
                'GymName' => $faker->company,
                'GymOwnerID' => $index,
                'address' => $faker->address,
                'city' => $faker->city,
                'Rating' => $faker->randomFloat(1, 1, 5),
                'OpeningHours' => '9AM - 9PM',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
