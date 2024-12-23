<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            AthletesTableSeeder::class,
            CoachesTableSeeder::class,
            GymOwnersTableSeeder::class,
            SportsTableSeeder::class,
            GymsTableSeeder::class,
            ClassesTableSeeder::class,
            PaymentsTableSeeder::class,
            BookingsTableSeeder::class,
            ReviewsTableSeeder::class,

        ]);
    }

}
