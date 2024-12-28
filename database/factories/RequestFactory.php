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
            'type_of_cleaning' => ['standard', 'deep', 'end_of_work', 'other'][array_rand(['standard', 'deep', 'end_of_work', 'other'])],
            'place' => ['apartment', 'house', 'commercial_or_office', 'other'][array_rand(['apartment', 'house', 'commercial_or_office', 'other'])],
            'number_of_rooms' => ['one_room', 'two_rooms', 'three_rooms', 'four_or_more_rooms', 'other'][array_rand(['one_room', 'two_rooms', 'three_rooms', 'four_or_more_rooms', 'other'])],
            'number_of_bathrooms' => ['one', 'two', 'three_or_more', 'none'][array_rand(['one', 'two', 'three_or_more', 'none'])],
            'has_pets' => $this->faker->boolean(),
            'date_service' => $this->faker->date(),
            'status' => ['pending', 'accepted', 'rejected', 'completed'][array_rand(['pending', 'accepted', 'rejected', 'completed'])],
            'amount' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
