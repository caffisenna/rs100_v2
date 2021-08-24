<?php

namespace Database\Factories;

use App\Models\entryForm;
use Illuminate\Database\Eloquent\Factories\Factory;

class entryFormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = entryForm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'furigana' => $this->faker->text,
        'bs_id' => $this->faker->text,
        'district' => $this->faker->text,
        'dan_name' => $this->faker->text,
        'dan_number' => $this->faker->text,
        'birth_day' => $this->faker->word,
        'gender' => $this->faker->text,
        'zip' => $this->faker->text,
        'address' => $this->faker->text,
        'telephone' => $this->faker->text,
        'cellphone' => $this->faker->text,
        '50km_exp' => $this->faker->text,
        'parent_name' => $this->faker->text,
        'parent_name_furigana' => $this->faker->text,
        'parent_relation' => $this->faker->text,
        'emer_phone' => $this->faker->text,
        'sm_name' => $this->faker->text,
        'sm_position' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
