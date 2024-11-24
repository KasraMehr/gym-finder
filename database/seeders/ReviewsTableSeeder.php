<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('reviews')->insert([
                'ReviewerID' => $faker->numberBetween(1, 10),
                'Rating' => $faker->randomFloat(1, 1, 5),
                'comment' => $faker->sentence,
                'ReviewDate' => $faker->dateTimeThisYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
