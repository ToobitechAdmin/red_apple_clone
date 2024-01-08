<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PickupTime;
use Carbon\Carbon;

class DeliveryTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr=[
            [
                'day'=> "MONDAY",
                'opening_time' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'closing_time'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "TUESDAY",
                'opening_time' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'closing_time'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "WEDNESDAY",
                'opening_time' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'closing_time'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "THURSDAY",
                'opening_time' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'closing_time'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "FRIDAY",
                'opening_time' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'closing_time'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "SATURDAY",
                'opening_time' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'closing_time'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "SUNDAY",
                'opening_time' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'closing_time'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
        ];

        foreach ($arr as $pickup) {
            PickupTime::create($pickup);
        }
    }
}
