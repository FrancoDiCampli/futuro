<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Job;
use App\Models\Student;
use App\Models\Subcategory;
use App\Models\User;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->safeEmail,
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'password' => $this->faker->password,
            'tos' => $this->faker->boolean,
            'notification' => $this->faker->boolean,
            'title' => $this->faker->sentence(4),
            'experience' => $this->faker->word,
            'university' => $this->faker->word,
            'graduated_at' => $this->faker->date(),
            'average' => $this->faker->randomFloat(1, 10, 2),
            'speech' => $this->faker->text,
            'available' => $this->faker->word,
            'preference' => $this->faker->word,
            'skils' => $this->faker->word,
            'courses' => $this->faker->word,
            'hobbies' => $this->faker->word,
            'website' => $this->faker->word,
            'birthdate' => $this->faker->date(),
            'avatar' => $this->faker->word,
            'subcategory_id' => Subcategory::factory(),
            'city_id' => City::factory(),
            'job_id' => Job::factory(),
            'user_id' => User::factory(),
        ];
    }
}
