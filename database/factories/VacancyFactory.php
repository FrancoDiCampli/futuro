<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\City;
use App\Models\Vacancy;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $cities =  City::select('id')->get();
        $subcategories =  Subcategory::select('id')->get();


        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text,
            'looking_for' => $this->faker->text,
            'hiring' => $this->faker->randomElement(['Permanente','Temporario','Por proyecto','Becario']),
            'available' =>$this->faker->randomElement(['Tiempo completo','Medio tiempo']),
            'country' => 1,
            'schedule' => $this->faker->randomElement(['Mañana','Tarde','Sin preferencia']),
            'paid' => 1,
            'pretended' =>$this->faker->randomFloat(2),
            'skills' =>$this->faker->randomElements(['Autoconocimiento y Autoconfianza','Adaptabilidad y Flexibilidad','Trabajo en Equipo','Capacidad de Liderazgo','Capacidad Crítica','Resolución de Problemas','Toma de Decisiones','Proactividad','Comunicación Efectiva'],2),
            'enterprise' => 1,
            'experience'=>$this->faker->randomElement(['Estudiante','Graduado','1er año','2do año']),
            'visible' => 1,
            'expired_at' => Carbon::today()->addDays(30),
            'city_id' =>$this->faker->randomElement($cities),
            'subcategory_id' => $this->faker->randomElement($subcategories),
            'recruiter_id'=>rand(1,2)
        ];
    }
}
