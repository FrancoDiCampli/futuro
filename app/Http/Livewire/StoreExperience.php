<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Experience;
use App\Models\Student;
use Livewire\Component;

class StoreExperience extends Component
{

    public $company='Sancor';
    public $position;
    public $started_at;
    public $end_at;
    public $actual = false;
    public $description;
    public $student_id;
    public $city_id;
    public $cities;
    public $msg;
    public $student;
    // protected $rules = [
    //     'company' => 'required',
    //     'position' => 'required',
    // ];

    public function mount(){
        $this->student =  Student::find(user()->profile->id);
    }

    public function render()
    {
        $this->student =  Student::find(1);
        $this->cities = City::all();
        return view('livewire.store-experience');
    }

    public function submit() {

        $this->validate([
            'company'       => 'required',
            'position'      => 'required',
            'started_at'    => 'required',
            'end_at'        => 'required',
            'actual'        => 'nullable',
            'description'   => 'required',
            'city_id'       => 'required',
        ]);

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

    public function clearForm(){
         $this->company=null;
        $this->position=null;
        $this->started_at=null;
        $this->end_at=null;
        $this->actual=null;
        $this->description=null;

         $this->city_id=null;
    }

}
