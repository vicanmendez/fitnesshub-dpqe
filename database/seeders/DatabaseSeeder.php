<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->call([
            CountrySeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            GymSeeder::class,
            UserSeeder::class,
            // Add other seeder classes here
        ]);
    }
}
