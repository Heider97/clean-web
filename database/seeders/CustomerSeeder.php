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
        // Register a customer
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('customer');

        Customer::create([
            'user_id' => $user->id,
            'address' => '123 Main St',
            'latitude' => 19.432608,
            'longitude' => -99.133209,
        ]);
    }
}
