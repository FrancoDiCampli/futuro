<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Postulation;
use LivewireUI\Modal\ModalComponent;

class StudentPostulation extends ModalComponent
{
    public $student,$vacante;

    public function mount(Vacancy $vacancy){
        $this->vacante = $vacancy;
    }

    public function render()
    {

        return view('livewire.student-postulation');
    }

    public function savePostulation(){

        $vacancy = Vacancy::find($this->vacante->id);
        $postulation = Postulation::where('student_id',user()->profile->id)->where('vacancy_id',$vacancy->id)->first();

        if(isset($postulation)){
            $postulation->update([
                'status'    =>'new'
            ]);
        }else{

            user()->profile->vacancies()->attach($vacancy->id,['visible'=>true,'status'=>'new']);
        }

        $this->closeModal();
        return redirect()->route('vacancies.show',$vacancy->id);
    }
}
