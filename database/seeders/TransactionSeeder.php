<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Request;
use App\Models\Transaction;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $requests = Request::all();

        foreach ($requests as $request) {
            Transaction::factory()->create([
                'request_id' => $request->id,
                'client_id' => $request->client_id,
                'professional_id' => User::role('professional')->inRandomOrder()->first()->id
            ]);
        }
    }
}
