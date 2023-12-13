<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $arr=[
            [
                'name'=> "Karachi",
                'slug'=>Str::slug('Karachi'),
            ],
            [
                'name'=> "Lahore",
                'slug'=>Str::slug('Lahore'),
            ],
            [
                'name'=> "Islamabad",
                'slug'=>Str::slug('Islamabad'),
            ],
        ];

        foreach ($arr as $cityData) {
            City::create($cityData);
        }    }
}
