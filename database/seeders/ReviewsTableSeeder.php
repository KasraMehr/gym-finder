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
            $randomChoice = rand(1, 3);

            if ($randomChoice == 1) {
                $reviewableType = 'App\\Models\\Class';
            } elseif ($randomChoice == 2) {
                $reviewableType = 'App\\Models\\Coach';
            } else {
                $reviewableType = 'App\\Models\\Gym';
            }
            $reviewableId = rand(1, 10);

            // Insert the review
            DB::table('reviews')->insert([
                'user_ID' => rand(1, 10),
                'Rating' => $faker->randomFloat(1, 1, 5),
                'comment' => $faker->sentence,
                'ReviewDate' => $faker->dateTimeThisYear(),
                'reviewable_id' => $reviewableId,
                'reviewable_type' => $reviewableType,  // Polymorphic type (Class, Coach, or Gym)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
