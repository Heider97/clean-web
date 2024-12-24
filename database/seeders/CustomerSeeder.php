<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create customers
        User::factory()->count(10)->create()->each(function ($user) {
            $user->assignRole('customer');

            Customer::create([
                'user_id' => $user->id,
                'address' => '123 Main St',
                'latitude' => 19.432608,
                'longitude' => -99.133209,
            ]);
        });
    }
}
