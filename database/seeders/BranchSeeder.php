<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr=[
            [
                'city_id'=>1,
                'name'=> "Sakhi Hasan Branch",
                'address'=>"R-120 Block 20 F.B Area Karachi",
                'number'=>2147483647,
            ],
            [
                'city_id'=>1,
                'name'=> "gulshan branch",
                'address'=>"R-120 Block 20 F.B Area Karachi",
                'number'=>2147483647,
            ],
            [
                'city_id'=>2,
                'name'=> "d-chock branch",
                'address'=>"R-160 Block 50",
                'number'=>03453142655,
            ],
            [
                'city_id'=>3,
                'name'=> "daman-e-koh hill",
                'address'=>"Daman -e- Koh Rd, E-7, Islamabad, Islamabad Capital Territory 44000",
                'number'=>123,
            ],
        ];

        foreach ($arr as $branch) {
            Branch::create($branch);
        }
    }
}
