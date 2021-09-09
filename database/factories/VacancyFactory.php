<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Subcategory;
use App\Models\Vacancy;

class VacancyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text,
            'looking_for' => $this->faker->text,
            'hiring' => $this->faker->word,
            'available' => $this->faker->word,
            'country' => $this->faker->country,
            'schedule' => $this->faker->word,
            'paid' => $this->faker->word,
            'skills' => $this->faker->word,
            'enterprise' => $this->faker->boolean,
            'visible' => $this->faker->boolean,
            'expired_at' => $this->faker->dateTime(),
            'city_id' => City::factory(),
            'subcategory_id' => Subcategory::factory(),
        ];
    }
}
