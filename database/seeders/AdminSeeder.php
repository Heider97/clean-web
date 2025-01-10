<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Register a customer
        $user = User::create([
            'name' => 'Heider Zapa',
            'email' => 'heiderzapa78@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('admin');
    }
}
