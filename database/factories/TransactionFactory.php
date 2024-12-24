<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    public function definition()
    {
        return [
            'amount' => $this->faker->randomFloat(2, 50, 500),
            'payment_method' => ['cash', 'credit_card', 'paypal'][array_rand(['cash', 'credit_card', 'paypal'])],
            'status' => ['pending', 'paid', 'failed'][array_rand(['pending', 'paid', 'failed'])],
        ];
    }
}
