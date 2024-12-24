<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    public function definition()
    {
        return [
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'description' => $this->faker->sentence,
            'status' => ['pending', 'accepted', 'rejected', 'completed'][array_rand(['pending', 'accepted', 'rejected', 'completed'])],
        ];
    }
}
