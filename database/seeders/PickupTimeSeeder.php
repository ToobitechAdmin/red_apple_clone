<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deliverytime;
use Carbon\Carbon;

class PickupTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr=[
            [
                'day'=> "MONDAY",
                'to' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'from'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "TUESDAY",
                'to' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'from'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "WEDNESDAY",
                'to' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'from'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "THURSDAY",
                'to' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'from'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "FRIDAY",
                'to' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'from'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "SATURDAY",
                'to' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'from'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
            [
                'day'=> "SUNDAY",
                'to' => Carbon::createFromFormat('H:i A', '2:00 AM')->format('H:i:s'),
                'from'=>Carbon::createFromFormat('H:i A', '2:00 PM')->format('H:i:s'),
            ],
        ];

        foreach ($arr as $delivery) {
            DeliveryTime::create($delivery);
        }
    }
}
