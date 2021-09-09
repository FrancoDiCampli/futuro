<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;

class JobController extends Controller
{
    public function index(){
        $jobs =  Vacancy::all();
        return view('jobs.index',compact('jobs'));
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
        return $request;
        $request['expired_at']= Carbon::today()->addDays(30);
        $request['skills'] = json_encode($request->skills);
        Vacancy::create($request->all());


        return redirect()->route('jobs.index');
    }
}
