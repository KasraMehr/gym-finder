<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('sports')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'olampyan' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
