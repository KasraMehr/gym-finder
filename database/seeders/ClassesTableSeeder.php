<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('classes')->insert([
                'GymID' => $faker->numberBetween(1, 10),
                'SportID' => $faker->numberBetween(1, 5),
                'CoachID' => $faker->numberBetween(1, 10),
                'className' => $faker->word . ' ' . $faker->randomElement(['Yoga', 'Cardio', 'Boxing', 'Weightlifting']),
                'schedule' => $faker->dayOfWeek . ' ' . $faker->time() . ' - ' . $faker->time(),
                'duration' => $faker->randomFloat(1, 0.5, 3),
                'price' => $faker->numberBetween(10, 100),
                'MaxParticipants' => $faker->numberBetween(5, 30),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
