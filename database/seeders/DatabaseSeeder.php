<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\metodePembayaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(CatagorySeeder::class);
        $this->call(MetodePembayaranSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminAccountSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
