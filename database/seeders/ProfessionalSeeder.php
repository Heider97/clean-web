<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Professional;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProfessionalSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create professionals
        User::factory()->count(5)->create()->each(function ($user) use ($faker) {
            $user->assignRole('professional');
            
            Professional::create([
                'user_id' => $user->id,
                'address' => '123 Main St',
                'phone_number' => $faker->phoneNumber,
                'rating' => 4.5,
                'total_reviews' => 10,
                'latitude' => 19.432608,
                'longitude' => -99.133209,
            ]);

        });
        
    }
}
