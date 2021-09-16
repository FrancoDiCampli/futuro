<?php

namespace App\Http\Livewire;

use App\Models\Enterprise;
use Livewire\Component;

class Enterprises extends Component
{
    public $enterprises;
    public function render()
    {
       $this->enterprises = Enterprise::all();

        return view('livewire.enterprises')->with('enterprises');
    }
}
