<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'PhoneNumber' => $faker->phoneNumber,
                'ProfilePicture' => $faker->imageUrl(),
                'gender' => $faker->randomElement(['man', 'woman']),
                'brith_day' => $faker->date(),
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'City' => $faker->city,
                'Country' => $faker->country,
                'type' => $faker->randomElement(['athlete', 'coach', 'gym_owner']),
                'invite_link' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
