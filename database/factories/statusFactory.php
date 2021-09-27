<?php

namespace Database\Factories;

use App\Models\status;
use Illuminate\Database\Eloquent\Factories\Factory;

class statusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = status::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'day1_start_time' => $this->faker->word,
        'day1_end_time' => $this->faker->word,
        'day2_start_time' => $this->faker->word,
        'day2_end_time' => $this->faker->word,
        'reach_50km_time' => $this->faker->word,
        'reach_100km_time' => $this->faker->word,
        'day1_distance' => $this->faker->word,
        'day2_distance' => $this->faker->word
        ];
    }
}
