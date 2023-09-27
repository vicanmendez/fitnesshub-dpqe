<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('gyms')->insert([
            'id' => 2,
            'name' => 'Gym 1',
            'address' => 'Calle 1',
            'city_id' => 100,
            'phone' => '123456789',
        ]);
    }
}
