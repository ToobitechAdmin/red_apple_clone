<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i=0; $i < 50 ; $i++) {
            Product::create([
                'name'=> $faker->name,
                'title'=> $faker->title,
                'image'=> 'documents/product/'.random_int(1, 20).'.png',
                'description'=> $faker->text,
                'category_id'=> random_int(1,10),
                'price'=> random_int(100,500),
            ]);
        }
    }
}
