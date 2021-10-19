<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\Student;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Language;
use App\Models\Software;
use App\Models\Postulation;
use App\Models\Subcategory;
use Illuminate\Support\Arr;
use App\Http\Traits\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentStoreRequest;

class StudentController extends Controller
{
    use Profile;
    public function dashboard(){
        $postulations = [];
        if(isset(user()->profile->id)) $postulations = Postulation::where('student_id',user()->profile->id)->paginate(2);
        return view('admin.student.dashboard',compact('postulations'));
    }

    public function index(){

        // $postulations = user()->profile->vacancies;

        // return view('admin.student.dashboard',compact('postulations'));
        $students = null;
        if(user()->profile->premiun_active) $students = Student::orderBy('created_at')->paginate(5);
        return view('students.index',compact('students'));
    }



    public function store(StudentStoreRequest $request){


        $validated =  $request->validated();
        $student = DB::transaction(function () use ($validated) {
            $count =  20 - count($validated);
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
                            'completed'         =>($count*100)/20

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


        // $total =  $student->percentage;

        $completed = json_decode($student->completed);
        (isset($completed->personal)) ? ($personal = $completed->personal) : $personal = 0;
        (isset($completed->education)) ? ($education = $completed->education) : $education = 0;
        // $education = $completed->education;
        $total = $personal+$education;

        $per = user()->profile->percentage;

        return view('students.edit',compact('student','categories','subcategories','countries','states','cities','skills','languages','software','per'));
    }

    public function show(Student $student){

        $per = $student->percentage;

        return view('students.profile',compact('student','per'));
    }


    public function profile(){

        $skills =  Vacancy::SKILLS;
        $categories =  Category::all();
        $subcategories =  Subcategory::all();
        $cities =  City::all();
        $countries = Country::all();
        $states = State::all();
        $languages = Language::all();
        $software = Software::all();
        $vacancies = Vacancy::all();

        $per = user()->profile->percentage;



        if(!user()->hasStudentProfile) return view('admin.student.profile.create',compact('categories','subcategories','countries','states','cities','skills','languages','software','per'));
        $student = Student::find(user()->profile->id);
        $postulations =  Postulation::where('student_id',$student->id)->get();

        return view('students.profile',compact('student','postulations','per'));
    }

    public function updateProfile(Request $request,Student $student){

        $validated = $request->validate([
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
            'avatar'        =>  'nullable|image'
        ]);


        $aux = Profile::setPersonal($request);

        $completed = json_decode($student->completed,true);
        $completed['personal']=$aux;

        $student->update([
            'last_name'     =>   $validated['last_name'],
            'first_name'    =>   $validated['first_name'],
            'title'         =>   $validated['title'],
            'birthdate'     =>   $validated['birthdate'],
            'city_id'       =>   $validated['city_id'],
            'speech'        =>   $validated['speech'],
            'available'     =>   $validated['available'],
            'preference'    =>   $validated['preference'],
            'hobbies'       =>   $validated['hobbies'],
            'website'       =>   $validated['website'],
            'completed'     =>   json_encode($completed),

        ]);
        if($request->has('avatar')) user()->profile->avatar()->make()->upload($validated['avatar'], 'avatar/'.user()->id, 'avatar');

        return back();
    }

    public function updateEducation(Request $request,Student $student){
        $validated = $request->validate([
            'subcategory_id'=> 'required',
            'experience'    => 'required',
            'university'    => 'nullable',
            'graduated_at'  => 'nullable',
            'average'       => 'nullable',
            'courses'       => 'nullable',
            'skills'        => 'nullable'
        ]);

        $aux = Profile::setEducation($request);
        $completed = json_decode($student->completed,true);
        $completed['education']=$aux;

        $student->update([
            'subcategory_id'=> $validated['subcategory_id'],
            'experience'    => $validated['experience'],
            'university'    => $validated['university'],
            'graduated_at'  => $validated['graduated_at'],
            'average'       => $validated['average'],
            'courses'       => $validated['courses'],
            'skills'        => $validated['skills'],
            'completed'     =>    json_encode($completed),
        ]);

        return back();
    }

    public function updateExperience(Request $request,Student $student){

        return $request;
    }


}
