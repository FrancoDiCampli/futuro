<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithPagination;

class Vacancies extends Component
{
    use WithPagination;

    public $hiring;
    public $experience;
    public $available;
    public $states;

    public $filters;
    public $selectedState = NULL;

    public function mount(){
        $this->filters = [

        ];
    }

    public function render()
    {

        return view('livewire.vacancies',['vacancies'=> Vacancy::Filter($this->filters)->orderBy('created_at','asc')->get()]);
    }

    public function updatedSelectedState($state){
        $this->filters=[
            'city_id' =>[$state]
        ];

        // $this->vacancies =  Vacancy::Filter($filters)->orderBy('created_at','asc')->get();
    }



}
