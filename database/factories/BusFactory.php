<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bus;

class BusFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Bus::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'number' => $this->faker->buildingNumber,
            'total_seats' => 50,
            'seat_number_start' => 1,
            'seat_number_end' => 50,
        ];
    }
}
