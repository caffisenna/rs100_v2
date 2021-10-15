<?php

namespace Database\Factories;

use App\Models\temps;
use Illuminate\Database\Eloquent\Factories\Factory;

class tempsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = temps::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'temp_day1_before' => $this->faker->word,
        'temp_day1_after' => $this->faker->word,
        'temp_day2_before' => $this->faker->word,
        'temp_day2_after' => $this->faker->word
        ];
    }
}
