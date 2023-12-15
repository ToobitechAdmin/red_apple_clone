<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i=0; $i < 10 ; $i++) {
            Category::create([
                'name'=> $faker->name,
            ]);
        }
    }
}
