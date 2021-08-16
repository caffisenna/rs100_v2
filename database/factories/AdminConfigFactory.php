<?php

namespace Database\Factories;

use App\Models\AdminConfig;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminConfigFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminConfig::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'create_account' => $this->faker->word,
        'create_application' => $this->faker->word,
        'elearning' => $this->faker->word,
        'healthcheck' => $this->faker->word,
        'user_edit' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
