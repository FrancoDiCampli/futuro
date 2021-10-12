<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class UpdateProfile extends Component
{
    public $currentStep = 1;
    public $totalSteps = 4;

    protected $student;
    public $first_name;
    public $last_name;

    public function mount(){
        $this->student = Student::find(user()->profile->id);
        $this->first_name = $this->student->first_name;
        $this->last_name = $this->student->last_name;
    }

    public function render()
    {
        return view('livewire.update-profile');
    }

    public function firstSubmit(){

        $this->resetErrorBag();

        $validatedData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',

        ]);

        $this->next();
    }

    public function next(){
        $this->currentStep++;
    }
    public function back(){
        $this->currentStep--;
    }

    public function register(){

    }
}
