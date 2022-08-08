<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trip;

class TripFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Trip::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'name' => $this->faker->citySuffix,
            'from_area_id' => \App\Models\Area::query()->inRandomOrder()->first()->id,
            'to_area_id' => \App\Models\Area::query()->inRandomOrder()->first()->id,
            'bus_id' => \App\Models\Bus::query()->inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(Trip::TRIP_STATUS),
        ];
    }
}
