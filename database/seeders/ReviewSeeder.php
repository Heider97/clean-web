<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Request;
use App\Models\Review;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requests = Request::all();

        foreach ($requests as $request) {
            Review::factory()->create([
                'client_id' => $request->client_id,
                'professional_id' => User::role('cleaner')->inRandomOrder()->first()->id,
                'request_id' => $request->id,
            ]);
        }
    }
}
