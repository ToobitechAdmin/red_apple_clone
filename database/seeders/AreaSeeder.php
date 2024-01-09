<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr=[
            [
                'city_id'=>1,
                'name'=> "Ancholi",
                'address'=>"R-120 Block 20 F.B Area Karachi",
                'number'=>"2147483647",
            ],
            [
                'city_id'=>1,
                'name'=> "Gulshan",
                'address'=>"R-120 Block 20 F.B Area Karachi",
                'number'=>"2147483647",
            ],
            [
                'city_id'=>1,
                'name'=> "Gulistan-e-Johar",
                'address'=>"R-160 Block 50",
                'number'=>"03453142655",
            ],
            [
                'city_id'=>2,
                'name'=> "Gulberg",
                'address'=>"Daman -e- Koh Rd, E-7, Islamabad, Islamabad Capital Territory 44000",
                'number'=>"123",
            ],
            [
                'city_id'=>2,
                'name'=> "Samanabad",
                'address'=>"R-160 Block 50",
                'number'=>"03453142655",
            ],
            [
                'city_id'=>3,
                'name'=> "margalla hill",
                'address'=>"Daman -e- Koh Rd, E-7, Islamabad, Islamabad Capital Territory 44000",
                'number'=>"123",
            ],
            [
                'city_id'=>3,
                'name'=> "Daman-e-koh",
                'address'=>"Daman -e- Koh Rd, E-7, Islamabad, Islamabad Capital Territory 44000",
                'number'=>"123",
            ],
        ];

        foreach ($arr as $area) {
            Area::create($area);
        }
    }
}
