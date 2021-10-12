<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Enterprise;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
class StoreEnterprise extends ModalComponent
{
    use WithFileUploads;
    public $cities;

    public $name;
    public $employees;
    public $sector;
    public $turn;
    public $website;
    public $vision;
    public $description;
    public $rfc;
    public $business_name;
    public $city_id;

    public $logo;
    public function mount(){
        $this->cities = City::all();
    }

    public function render()
    {
        return view('livewire.store-enterprise');
    }

    public function save(){
        $this->validate([
            'name'          => 'required',
            'employees'     => 'required',
            'sector'        => 'required',
            'turn'          => 'required',
            'website'       => 'nullable',
            'description'   => 'required',
            'city_id'       => 'required',
            'vision'        => 'required',
            'rfc'           => 'required',
            'business_name' => 'required',
            'logo'         => 'image', // 1MB Max
        ]);

        $enterprise = Enterprise::create([
            'name'          => $this->name,
            'employees'     => $this->employees,
            'sector'        => $this->sector,
            'turn'          => $this->turn,
            'website'       => 'nullable',
            'description'   => $this->description,
            'city_id'       => $this->city_id,
            'vision'        => $this->vision,
            'rfc'           => $this->rfc,
            'business_name' => $this->business_name
        ]);

        $enterprise->logo()->make()->upload($this->logo, 'logo/'.user()->id, 'logo');

        $this->clearForm();
    }

    public function cancel(){
        $this->forceClose()->closeModal();
    }

    public function clearForm(){
        $this->name=null;
        $this->employees=null;
        $this->sector=null;
        $this->turn=null;
        $this->website=null;
        $this->description=null;
        $this->city_id=null;
        $this->vision=null;
        $this->rfc=null;
        $this->business_name=null;

        $this->forceClose()->closeModal();
    }

}
