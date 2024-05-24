<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            DB::table('metode_pembayarans')->insert([
                'name' => $faker->word,
                'virtual_acc' => $faker->word,
                'image' => $faker->imageUrl(5, 5, 'atm'),
            ]);
        }
    }
}
