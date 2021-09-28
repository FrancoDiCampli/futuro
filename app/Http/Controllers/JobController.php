<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Job;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreJobRequest;

class JobController extends Controller
{
    public function index(){

        $vacancies =  Vacancy::where('recruiter_id',user()->profile->id)->paginate(10);
        return view('vacancy.index',compact('vacancies'));
    }

    public function create(){
        $skills =  Vacancy::SKILLS;
        $categories =  Category::all();
        $subcategories =  Subcategory::all();
        $cities =  City::all();
        $countries = Country::all();
        $states = State::all();
        return view('jobs.create',compact('categories','subcategories','countries','states','cities','skills'));
    }

    public function store(StoreJobRequest $request){


        $validated =  $request->validated();

        $job = DB::transaction(function () use ($validated) {
            return Vacancy::create([
                        'title'         => $validated['title'],
                        'description'   => $validated['description'],
                        'looking_for'   => $validated['looking_for'],
                        'hiring'        => $validated['hiring'],
                        'available'     => $validated['available'],
                        'country'       => $validated['country'],
                        'schedule'      => $validated['schedule'],
                        'experience'    => $validated['experience'],
                        'paid'          => $validated['paid'],
                        'pretended'     => $validated['pretended'],
                        'skills'        => $validated['skills'],
                        'enterprise'    => $validated['enterprise'],
                        'visible'       => $validated['visible'],
                        'expired_at'    => $validated['expired_at'],
                        'city_id'       => $validated['city_id'],
                        'subcategory_id'=> $validated['subcategory_id'],
                        'recruiter_id'  => $validated['recruiter_id'],
            ]);
        });


        return redirect()->route('recruiters.index');
    }

    public function show(Vacancy $job){

        return view('jobs.show',compact('job'));
    }

    public function postulation(Request $request){

        $vacancy = Vacancy::find($request->vacancy_id);
        user()->profile->vacancies()->attach($vacancy->id,['visible'=>true,'status'=>'new']);
        return redirect()->route('vacancies.index');
    }
}
