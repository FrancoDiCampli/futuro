<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentStoreRequest;


class StudentController extends Controller
{
    public function index(){
        return Student::all();
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

        $student->avatar()->make()->upload($validated['avatar'], 'avatar/'.$student->id, 'avatar');

        $student->user()->save(user());

        return redirect()->route('jobs.index');
    }
}
