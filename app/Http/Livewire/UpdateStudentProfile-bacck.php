<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Student;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;
use App\Models\Language;
use App\Models\Software;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

class UpdateStudentProfile extends Component
{
    public $currentStep = 1;

    public $successMsg = '';

    public $skills;
    public $categories ;
    public $subcategories;
    public $cities;
    public $countries;
    public $states;
    public $languages;
    public $software;
    public $vacancies;

    public $first_name;
    public $last_name;
    public $tos;
    public $notification;
    public $title;
    public $experience;
    public $university;
    public $graduated_at;
    public $average;
    public $speech;
    public $available;
    public $preference;
    public $student_skills;
    public $courses;
    public $hobbies;
    public $website;
    public $birthdate;
    public $subcategory_id;
    public $city_id;
    public $completed;

    public $validatedData;

    public $student;

    public function mount(){
        if(isset(user()->profile)) $student = Student::where('id',user()->profile->id)->first();

        if(isset($student)) $this->student = $student;

        $this->habilidades =  Vacancy::SKILLS;
        $this->categories =  Category::all();
        $this->subcategories =  Subcategory::all();
        $this->cities =  City::all();
        $this->countries = Country::all();
        $this->states = State::all();
        $this->lenguajes = Language::all();
        $this->softwares = Software::all();
        $this->vacancies = Vacancy::all();
    }

    public function render()
    {


        return view('livewire.update-student-profile');
    }


    public function setFields($student){

            $this->first_name= $student->first_name;
            $this->last_name= $student->last_name;
            $this->title= $student->title;
            $this->experience= $student->experience;
            $this->university= $student->university;
            $this->graduated_at= $student->graduated_at;
            $this->average= $student->average;
            $this->speech= $student->speech;
            $this->available= $student->available;
            $this->preference= $student->preference;
            $this->student_skills= $student->student_skills;
            $this->courses= $student->courses;
            $this->hobbies= $student->hobbies;
            $this->website= $student->website;
            $this->birthdate= $student->birthdate;
    }

    public function firstStepSubmit()
    {
        // $this->validate();



       $this->validate([
            'last_name'     => 'required|string',
            'first_name'    =>  'required|string',
            'title'         =>  'required',
            'birthdate'     =>  'required',
            'city_id'       =>  'required',
            'speech'        =>  'nullable',
            'available'     =>  'nullable',
            'preference'    =>  'nullable',
            'hobbies'       =>  'nullable',
            'website'       =>  'nullable',
        ]);

        // $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'experience'    => 'required',
            'university'    => 'nullable',
            'graduated_at'  => 'nullable',
            'average'       => 'nullable',
            'courses'       => 'nullable',
            'subcategory_id'=> 'nullable',
        ]);

        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {

        $this->validatedData = $this->validate([
            'company'       => 'nullable',
            'position'      => 'nullable',
            'started_at'    => 'nullable',
            'end_at'        => 'nullable',
            'city_id'       => 'nullable',
            'actual'        => 'nullable',
            'description'   => 'nullable',
        ]);

        $this->currentStep = 4;
    }

    public function submitAll(){

    }
    // public function submitForm()
    // {
    //     $this->validatedData = $this->validate([
    //         'tos'           => 'required',
    //         'notification'  => 'nullable',
    //         'posicometrica' => 'nullable',
    //     ]);

    //     $validated =  $this->validatedData;
    //     $student = DB::transaction(function () use ($validated) {
    //         $count =  20 - count($validated);
    //         return Student::create([
    //                         'first_name'        =>$validated['first_name'],
    //                         'last_name'         =>$validated['last_name'],
    //                         'tos'               =>$validated['tos'],
    //                         'notification'      =>$validated['notification'],
    //                         'title'             =>$validated['title'],
    //                         'experience'        =>$validated['experience'],
    //                         'university'        =>$validated['university'],
    //                         'graduated_at'      =>$validated['graduated_at'],
    //                         'average'           =>$validated['average'],
    //                         'speech'            =>$validated['speech'],
    //                         'available'         =>$validated['available'],
    //                         'preference'        =>$validated['preference'],
    //                         'skills'            =>$validated['skills'],
    //                         'courses'           =>$validated['courses'],
    //                         'hobbies'           =>$validated['hobbies'],
    //                         'website'           =>$validated['website'],
    //                         'birthdate'         =>$validated['birthdate'],
    //                         'subcategory_id'    =>$validated['subcategory_id'],
    //                         'city_id'           =>$validated['city_id'],
    //                         'completed'         =>($count*100)/20

    //         ]);
    //     });

    //     $this->successMsg = 'Team successfully created.';

    //     $this->clearForm();

    //     $this->currentStep = 1;
    // }
}
