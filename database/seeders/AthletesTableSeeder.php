<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AthletesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('athletes')->insert([
                'user_id' => $index,
                'interests' => json_encode([$faker->word, $faker->word]),
                'goals' => $faker->sentence,
                'honors' => $faker->sentence,
                'membership_level' => $faker->randomElement(['free', 'premium']),
                'hide_profile' => $faker->boolean,
                'age_group' => $faker->randomElement(['minors', 'infants', 'teenagers', 'adults', 'veterans']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
