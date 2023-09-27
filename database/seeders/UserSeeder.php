<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        echo "Generating user admin...";
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Administrador',
            'email' => 'admin@admin',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
            'active' => 1,
            'city_id' => 1,
        ]);


        echo "Generating user trainer...";
        DB::table('trainers')->insert([
            'user_id' => 1,
            'presentation' => 'Administrador del sistema',
            'gym_id' => 2,
        ]);




    }
}
