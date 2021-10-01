<?php

namespace App\Http\Livewire\Vacancie;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class Create extends Component
{
    public $skills, $categories, $subcategories, $cities, $countries, $states, $step;

    public $title, $category_id, $subcategory_id, $description, $looking_for, $state_id, $city_id, $experience, $hiring, $available, $schedule, $paid, $pretended, $enterprise, $visible;
    public $skills_selected = [];

    public $totalSteps = 2;
    public $currentStep = 1;
    public $informationActive = true;
    public $planActive = false;
    public $country = 1;
    public $vacancy_id;

    protected $rules = [
        'title' => 'required|min:6',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:subcategories,id',
        'description' => 'required|min:10',
        'looking_for' => 'required|min:10',
        'state_id' => 'required|exists:states,id',
        'city_id' => 'required|exists:cities,id',
        'experience' => 'required',
        'hiring' => 'required',
        'available' => 'required',
        'schedule' => 'required',
        'paid' => 'required',
        'pretended' => 'nullable',
        'skills_selected' => 'required|array',
        'enterprise' => 'required',
        'visible' => 'required',
        // 'country' => 'required',
    ];
    
    public function mount()
    {
        $this->currentStep = 1;
        $this->skills =  Vacancy::SKILLS;
        $this->categories =  Category::all();
        $this->subcategories =  Subcategory::all();
        $this->cities =  City::all();
        $this->countries = Country::all();
        $this->states = State::all();
        $this->step = 1;
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->store();
        $this->currentStep++;
        $this->informationActive = false;
        $this->planActive = true;
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        $this->informationActive = true;
        $this->planActive = false;
    }

    public function store()
    {
        if ($this->currentStep == 1) {
            $data = $this->validate();

            $data['country'] = $this->country;
            $data['skills'] = $this->skills_selected;
            $data['expired_at'] = '30-10-2021';
            $data['recruiter_id']  = user()->profile->id;

            $this->vacancy_id = $this->vacancy_id ? $this->vacancy_id->id : null;
            
            $this->vacancy_id = Vacancy::updateOrCreate(['id' => $this->vacancy_id], [
                'title'         => $data['title'],
                'description'   => $data['description'],
                'looking_for'   => $data['looking_for'],
                'hiring'        => $data['hiring'],
                'available'     => $data['available'],
                'country'       => $data['country'],
                'schedule'      => $data['schedule'],
                'experience'    => $data['experience'],
                'paid'          => $data['paid'],
                'pretended'     => $data['pretended'],
                'skills'        => $data['skills'],
                'enterprise'    => $data['enterprise'],
                'visible'       => $data['visible'],
                'expired_at'    => $data['expired_at'],
                'city_id'       => $data['city_id'],
                'subcategory_id'=> $data['subcategory_id'],
                'recruiter_id'  => $data['recruiter_id'],
            ]);

            session()->flash('message', $this->vacancy_id ? 'Vacante generada exitosamente. Estás a un paso de publicarla.' : 'Company created successfully.');
        }       
    }

    public function render()
    {
        return view('livewire.vacancie.create');
    }
}
