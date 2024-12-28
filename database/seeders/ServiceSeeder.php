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
        Service::firstOrCreate(['name' => 'Standard', 'svg' => 'storage/app/standard.svg']);
        Service::firstOrCreate(['name' => 'Deep', 'svg' => 'storage/app/deep.svg']);
        Service::firstOrCreate(['name' => 'End of work', 'svg' => 'storage/app/end_of_work.svg']);
        Service::firstOrCreate(['name' => 'Other', 'svg' => 'storage/app/other.svg']);
    }
}
