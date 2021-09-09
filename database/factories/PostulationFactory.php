<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Postulation;
use App\Models\Student;
use App\Models\Vacancy;

class PostulationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Postulation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vacancy_id' => Vacancy::factory(),
            'student_id' => Student::factory(),
            'visible' => $this->faker->boolean,
        ];
    }
}
