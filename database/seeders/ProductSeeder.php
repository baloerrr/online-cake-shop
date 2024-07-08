<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // foreach (range(1, 50) as $index) {
        //     DB::table('products')->insert([
        //         'catagory_id' => $faker->numberBetween(1, 2),
        //         'name' => $faker->word,
        //         'quantity' => $faker->numberBetween(20,100),
        //         'price' => $faker->randomFloat(2, 10, 1000),
        //         'image' => $faker->imageUrl(200, 200, 'food'),
        //     ]);
        // }
    }
}
