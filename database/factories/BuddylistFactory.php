<?php

namespace Database\Factories;

use App\Models\Buddylist;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuddylistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Buddylist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'person1' => $this->faker->randomDigitNotNull,
        'person2' => $this->faker->randomDigitNotNull,
        'person3' => $this->faker->randomDigitNotNull,
        'confirmed' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
