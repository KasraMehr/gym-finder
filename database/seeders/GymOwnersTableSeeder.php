<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymOwnersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('gym_owners')->insert([
                'user_id' => $index,
                'GymName' => $faker->company,
                'GymID' => $index,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
