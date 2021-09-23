<?php

namespace App\Http\Livewire;

use App\Models\Postulation;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class StoreNote extends ModalComponent

{
    public  Postulation $vacante;

    public function mount($postulation)
    {

        $this->vacante = Postulation::find($postulation);

    }
    public function render()
    {
        return view('livewire.store-note');
    }
}
