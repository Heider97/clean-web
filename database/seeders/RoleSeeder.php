<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles if not already created
        Role::firstOrCreate(['name' => 'customer']);
        Role::firstOrCreate(['name' => 'professional']);
    }
}
