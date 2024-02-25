<?php

namespace Database\Seeders;

use App\Models\Catagory;
use Illuminate\Database\Seeder;

class CatagorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Food',
            'Drink',
            'Fresh',
            'Beauty',
            'Stationery',
            'Electronic',
        ];

        foreach ($categories as $categoryName) {
            Catagory::create([
                'name_catagory' => $categoryName,
            ]);
        }
    }
}
