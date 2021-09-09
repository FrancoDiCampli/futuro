<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Job;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'enterprise' => $this->faker->word,
            'ceo' => $this->faker->word,
            'city_id' => City::factory(),
            'started_at' => $this->faker->date(),
            'end_at' => $this->faker->date(),
            'description' => $this->faker->text,
        ];
    }
}
