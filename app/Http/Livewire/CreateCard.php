<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateCard extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-card');
    }

    public function cancel(){

        $this->closeModal();
    }
}
