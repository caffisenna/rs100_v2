<?php

namespace Database\Factories;

use App\Models\resultInputs;
use Illuminate\Database\Eloquent\Factories\Factory;

class resultInputsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = resultInputs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'day' => $this->faker->randomDigitNotNull,
        'distance' => $this->faker->word,
        'time' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
