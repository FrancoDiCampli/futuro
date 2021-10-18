<?php

namespace App\Http\Livewire;

use App\Models\Enterprise;
use Livewire\Component;

class Enterprises extends Component
{
    public $enterprises;

    protected $listeners = ['orderUpdate' => 'test'];



    public function render()
    {

       $this->enterprises = Enterprise::all();

        return view('livewire.enterprises')->with('enterprises');
    }

    public function test(){
        dd('asfsas asd');
    }

}
