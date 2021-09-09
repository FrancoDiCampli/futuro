<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country =  Country::create(['name'=>'Mexico']);
        $states = [
            'Aguascalientes'        =>['Aguascalientes'],
            'Baja California'       =>['Mexicali'],
            'Baja California'       =>['La Paz'],
            'Campeche'              =>['San Francisco de Campeche'],
            'Chiapas'               =>['Tuxtla Gutiérrez'],
            'Chihuahua'             =>['Chihuahua'],
            'Ciudad de México'      =>['Ciudad de México'],
            'Coahuila'              =>['Saltillo'],
            'Nuevo León'            =>['Monterrey'],
            'Oaxaca'                =>['Oaxaca de Juárez'],
            'Puebla'                =>['Puebla de Zaragoza'],
            'Zacatecas'             =>['Zacatecas'],
        ];

        foreach ($states as $key=>$value) {
            $state = State::create([
                'name'          =>  $key,
                'country_id'    => $country->id
            ]);
            $cities =  $states[$key];
            foreach ($cities as $subcategory) {
                City::create([
                    'name'          => $subcategory,
                    'zip_code'      => rand(200,900),
                    'prefix'        => rand(500,1000),
                    'state_id'      => $state->id
                ]);
            }
        }
    }
}
