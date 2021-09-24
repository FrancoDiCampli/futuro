<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Experience;
use Livewire\Component;

class StoreExperience extends Component
{

    public $company;
    public $position;
    public $started_at;
    public $end_at;
    public $actual = false;
    public $description;
    public $student_id;
    public $city_id;
    public $cities;

    // protected $rules = [
    //     'company' => 'required',
    //     'position' => 'required',
    // ];

    public function render()
    {
        $this->cities = City::all();
        return view('livewire.store-experience');
    }

    public function submit() {

        // $validatedData = $this->validate();

        $experience = Experience::create([
                    'company'       =>    $this->company,
                    'position'      =>    $this->position,
                    'started_at'    =>    $this->started_at,
                    'end_at'        =>    $this->end_at,
                    'actual'        =>    $this->actual,
                    'description'   =>    $this->description,
                    'student_id'    =>    user()->profile->id,
                    'city_id'       =>    $this->city_id,

        ]);

    }

}
