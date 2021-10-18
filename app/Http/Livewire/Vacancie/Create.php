<?php

namespace App\Http\Livewire\Vacancie;

use Carbon\Carbon;
use Perafan\CashierOpenpay\Card;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Perafan\CashierOpenpay\Openpay\Card as OpenpayCard;

class Create extends Component
{
    public $skills, $categories, $subcategories, $cities, $countries, $states, $step;

    public $title, $category_id, $subcategory_id;
    public $description, $looking_for, $state_id, $city_id;
    public $experience, $hiring, $available, $schedule, $paid, $pretended, $enterprise=null, $visible=null;
    public $skills_selected = [];

    public $totalSteps = 2;
    public $currentStep = 1;
    public $informationActive = true;
    public $planActive = false;
    public $country = 1;
    public $vacancy_id;

    public $category;
    public $state;

    public $cards;
    public $card_id;
    public $plan='basico';


    protected $rules = [
        'title' => 'required|min:6',
        'category' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:subcategories,id',
        'description' => 'required|min:10',
        'looking_for' => 'required|min:10',
        'state' => 'required|exists:states,id',
        'city_id' => 'required|exists:cities,id',
        'experience' => 'required',
        'hiring' => 'required',
        'available' => 'required',
        'schedule' => 'required',
        'paid' => 'required',
        'pretended' => 'nullable',
        'skills_selected' => 'required|array',
        'enterprise' => 'nullable',
        'visible' => 'nullable',
        // 'country' => 'required',
    ];

    public function mount()
    {
        $this->getCards();
        $this->currentStep = 2;
        $this->skills =  Vacancy::SKILLS;
        $this->categories =  Category::all();
        $this->subcategories =  Subcategory::all();

        $this->cities =  City::all();
        $this->countries = Country::all();
        $this->states = State::all();
        $this->step = 2;

        $this->card_id = $this->cards[0]->id;
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

    public function selectedId($value)
    {
        dd($value);
        $this->card_id=$value;
    }

    public function store()
    {

        if ($this->currentStep == 1) {
            $data = $this->validate();

            $data['country'] = $this->country;
            $data['skills'] = $this->skills_selected;
            $data['expired_at'] = Carbon::today()->addDays(30);
            $data['recruiter_id']  = user()->profile->id;

            // Que es esto?
            $this->vacancy_id = $this->vacancy_id ? $this->vacancy_id->id : null;

            if(!isset($this->enterprise)) $this->enterprise = 0;
            if(!isset($this->visible)) $this->visible = 0;


            $this->vacancy_id = Vacancy::updateOrCreate(['id' => $this->vacancy_id], [
                'title'         => $data['title'],
                'slug'          => Str::slug($data['title']),
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
                'enterprise'    => $this->enterprise,
                'visible'       => $this->visible,
                'expired_at'    => $data['expired_at'],
                'city_id'       => $data['city_id'],
                'subcategory_id'=> $data['subcategory_id'],
                'recruiter_id'  => $data['recruiter_id'],
                'plan_id'       => 1,
            ]);

            session()->flash('message', $this->vacancy_id ? 'Vacante generada exitosamente. Estás a un paso de publicarla.' : 'Company created successfully.');
        }
    }

    public function render()
    {
        if(!empty($this->category)) {
            $this->subcategories = Subcategory::where('category_id', $this->category)->get();
         }else{
            $this->subcategories = Subcategory::all();
         }

         if(!empty($this->state)) {
            $this->cities = City::where('state_id', $this->state)->get();
         }else{
            $this->cities = City::all();
         }
        return view('livewire.vacancie.create');
    }

    public function getCards(){

        $openpay_customer = user()->profile->asOpenpayCustomer();

        $this->cards =OpenpayCard::all([], $openpay_customer);



    }
}
