<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class StoreEnterprise extends ModalComponent
{   public $cities;

    public function mount()
    {

        $this->cities = City::all();
    }
    public function render()
    {
        return view('livewire.store-enterprise');
    }
}
