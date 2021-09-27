<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Student;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Language;
use App\Models\Software;
use App\Models\Postulation;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentStoreRequest;

class StudentController extends Controller
{

    public function dashboard(){
        // return user()->id;
        $postulations = Postulation::where('student_id',user()->profile->id)->get();

        return view('admin.student.dashboard',compact('postulations'));
    }

    public function index(){

        $postulations = user()->profile->vacancies;

        return view('admin.student.dashboard',compact('postulations'));
    }

    public function store(StudentStoreRequest $request){


        $validated =  $request->validated();

        $student = DB::transaction(function () use ($validated) {
            return Student::create([
                            'first_name'        =>$validated['first_name'],
                            'last_name'         =>$validated['last_name'],
                            'tos'               =>$validated['tos'],
                            'notification'      =>$validated['notification'],
                            'title'             =>$validated['title'],
                            'experience'        =>$validated['experience'],
                            'university'        =>$validated['university'],
                            'graduated_at'      =>$validated['graduated_at'],
                            'average'           =>$validated['average'],
                            'speech'            =>$validated['speech'],
                            'available'         =>$validated['available'],
                            'preference'        =>$validated['preference'],
                            'skills'             =>$validated['skills'],
                            'courses'           =>$validated['courses'],
                            'hobbies'           =>$validated['hobbies'],
                            'website'           =>$validated['website'],
                            'birthdate'         =>$validated['birthdate'],
                            'subcategory_id'    =>$validated['subcategory_id'],
                            'city_id'           =>$validated['city_id'],

            ]);
        });


        // $student->avatar()->make()->upload($validated['avatar'], 'avatar/'.$student->id, 'avatar');
        user()->photo()->make()->upload($validated['avatar'], 'avatar/'.user()->id, 'avatar');

        $student->user()->save(user());

        return redirect()->route('vacancies.index');
    }

    public function edit(Student $student){
        $skills =  Vacancy::SKILLS;
        $categories =  Category::all();
        $subcategories =  Subcategory::all();
        $cities =  City::all();
        $countries = Country::all();
        $states = State::all();
        $languages = Language::all();
        $software = Software::all();
        $vacancies = Vacancy::all();
        return view('students.edit',compact('student','categories','subcategories','countries','states','cities','skills','languages','software'));
    }

    public function show(Student $student){

        return view('admin.estudiante.components.show',compact('student'));
    }


    public function update(Request $request,Student $student){

    }

    public function profile(){
        $student = Student::find(user()->profile->id);
        $postulations =  Postulation::where('student_id',$student->id)->get();
        return view('students.profile',compact('student','postulations'));
    }


}
