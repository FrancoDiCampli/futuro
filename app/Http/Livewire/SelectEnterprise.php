<?php

namespace App\Http\Livewire;

use App\Models\Enterprise;
use Livewire\Component;

class SelectEnterprise extends Component
{
    public $enterprises;

    protected $rules = [
        'enterprise.*.name'   => 'required',
        'enterprise.*.id'     => 'required',
    ];
    public function mount(){

    }

    public function render()
    {
        $this->enterprises = Enterprise::select('id','name')->get();
        return view('livewire.select-enterprise');
    }
}
