<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Professional;
use Illuminate\Database\Seeder;

class ProfessionalSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Register a professional
        $proUser = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
        ]);

        $proUser->assignRole('professional');

        Professional::create([
            'user_id' => $proUser->id,
            'address' => '123 Main St',
            'rating' => 4.5,
            'total_reviews' => 10,
            'latitude' => 19.432608,
            'longitude' => -99.133209,
        ]);
    }
}
