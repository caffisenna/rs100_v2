<?php

namespace Database\Factories;

use App\Models\resultUpload;
use Illuminate\Database\Eloquent\Factories\Factory;

class resultUploadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = resultUpload::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'time' => $this->faker->word,
        'distance' => $this->faker->word,
        'image_path' => $this->faker->word,
        'image' => $this->faker->word
        ];
    }
}
