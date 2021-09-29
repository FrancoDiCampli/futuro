<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class Vacancies extends Component
{
    protected $vacancies;
    public $hiring;
    public $experience;
    public $available;


    public function render()
    {
        $filters = [
            'experience'=>['Graduado']
        ];



        $this->vacancies =  Vacancy::Filter($filters)->orderBy('created_at','asc')->paginate(12);
        return view('livewire.vacancies',['vacancies'=>$this->vacancies]);
    }
}
