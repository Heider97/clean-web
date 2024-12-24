<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Request;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = User::role('customer')->get();

        foreach ($customers as $customer) {
            Request::factory()->count(rand(1, 3))->create([
                'client_id' => $customer->id,
            ]);
        }
    }
}
