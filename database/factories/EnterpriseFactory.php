<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Enterprise;

class EnterpriseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enterprise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'logo' => $this->faker->word,
            'employees' => $this->faker->numberBetween(1, 100),
            'sector' => $this->faker->word,
            'turn' => $this->faker->word,
            'website' => $this->faker->word,
            'vision' => $this->faker->catchPhrase,
            'description' => $this->faker->text,
            'rfc' => $this->faker->word,
            'business_name' => $this->faker->company,
            'city_id' => City::factory(),
        ];
    }
}
