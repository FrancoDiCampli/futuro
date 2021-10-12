<?php

namespace App\Http\Livewire;

use App\Models\Postulation;
use App\Models\Student;
use App\Models\Vacancy;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class InviteStudent extends ModalComponent
{
    public $vacancies;
    public $vacancy_id;
    public $student;
    public function render()
    {
        $student = Student::find(1);
        $postulations = $student->vacancies;
        $this->vacancies =  Vacancy::whereNotIn('id',$postulations->modelKeys())->where('recruiter_id',user()->profile->id)->get()  ;
        return view('livewire.invite-student');
    }

    public function saveInvitation(){

        $student = Student::find($this->student);
        $student->vacancies()->attach($this->vacancy_id,['visible'=>1,'status'=>'invited']);

        $this->student = $this->vacancy_id;

        $this->closeModal();

    }

    public function update()
    {

        $student = Student::find($this->student);
        $student->vacancies()->attach($this->vacancy_id,['visible'=>1,'status'=>'invited']);
        $this->closeModal();
    }

}
