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

        DB::table('metode_pembayarans')->insert([
            'name' => 'Dana',
            'virtual_acc' => '085384086119',
            'image' => null,
        ]);
    
        // Inserting "Bank Mandiri" with a random account number and null image
        DB::table('metode_pembayarans')->insert([
            'name' => 'Bank Mandiri',
            'virtual_acc' => $faker->bankAccountNumber,
            'image' => null,
        ]);
    }
}
