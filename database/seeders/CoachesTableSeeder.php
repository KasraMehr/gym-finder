<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoachesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('coaches')->insert([
                'user_id' => $index,
                'Specialties' => json_encode([$faker->word, $faker->word]),
                'Certifications' => json_encode([$faker->word, $faker->word]),
                'ExperienceYears' => $faker->numberBetween(1, 20),
                'Rating' => $faker->randomFloat(1, 1, 5),
                'documents_honors' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
