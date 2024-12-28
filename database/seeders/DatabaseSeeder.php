<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            CustomerSeeder::class,
            ProfessionalSeeder::class,
            ServiceSeeder::class,
            RequestSeeder::class,
            TransactionSeeder::class,
            ReviewSeeder::class
        ]);

    }
}
