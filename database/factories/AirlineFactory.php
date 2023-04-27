<?php

namespace Database\Factories;

use App\Models\Airline;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirlineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Airline::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foreign_id' => $this->faker->numberBetween(0, 1000),
            'name' => $this->faker->name,
            'country' => $this->faker->country,
            'logo' => $this->faker->url,
            'slogan' => $this->faker->text(100),
            'head_quaters' => $this->faker->address,
            'website' => $this->faker->url,
            'established' => $this->faker->year,
        ];
    }
}
