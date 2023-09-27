<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder 
{
    public function run() {
        echo "Seeding countries...\n";

        DB::table('countries')->insert([
            [
                'name' => 'Argentina',
                'language' => 'ES'
            ],
            [
                'name' => 'Brazil',
                'language' => 'PT'
            ],
            [
                'name' => 'Chile',
                'language' => 'ES'
            ],
            [
                'name' => 'Colombia',
                'language' => 'ES'
            ],
            [
                'name' => 'Ecuador',
                'language' => 'ES'
            ],
            [
                'name' => 'Mexico',
                'language' => 'ES'
            ],
            [
                'name' => 'Peru',
                'language' => 'ES'
            ],
            [
                'name' => 'Uruguay',
                'language' => 'ES'
            ],
            [
                'name' => 'Venezuela',
                'language' => 'ES'
            ]
        ]);
    }
}