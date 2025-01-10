<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles if not already created
        Service::firstOrCreate(['name' => 'House', 'svg' => 'assets/svgs/home/house.svg']);
        Service::firstOrCreate(['name' => 'Apartment', 'svg' => 'assets/svgs/home/apartment.svg']);
        Service::firstOrCreate(['name' => 'Commercial or Office', 'svg' => 'assets/svgs/home/building.svg']);
        Service::firstOrCreate(['name' => 'Other', 'svg' => 'assets/svgs/home/other.svg']);
    }
}
