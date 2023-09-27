<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CitySeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Seeding cities...\n";

        $capitals = [
            'Argentina' => 'Buenos Aires',
            'Brazil' => 'Brasilia',
            'Chile' => 'Santiago',
            'Colombia' => 'Bogotá',
            'Ecuador' => 'Quito',
            'Mexico' => 'Mexico',
            'Peru' => 'Lima',
            'Uruguay' => 'Montevideo',
            'Venezuela' => 'Caracas',
        ];

        foreach ($capitals as $country => $capital) {
            $countryRecord = DB::table('countries')->where('name', $country)->first();

            if ($countryRecord) {
                $countryId = $countryRecord->id;
                
                $provinceRecord = DB::table('provinces')->where(['name' => $capital, 'country_id' => $countryId])->first();

                if ($provinceRecord) {
                    $provinceId = $provinceRecord->id;

                    DB::table('cities')->insert([
                        'name' => $capital,
                        'province_id' => $provinceId,
                    ]);

                    $otherProvinceIds = DB::table('provinces')
                        ->where('country_id', $countryId)
                        ->where('name', '!=', $capital)
                        ->pluck('id');

                    foreach ($otherProvinceIds as $otherProvinceId) {
                        DB::table('cities')->insert([
                            'name' => 'Otra',
                            'province_id' => $otherProvinceId,
                        ]);
                    }
                } else {
                    echo "Province not found for $country - $capital\n";
                }
            } else {
                echo "Country not found: $country\n";
            }
        }
    }
      
}
