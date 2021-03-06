<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Enterprise;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEnterpriseRequest;
use App\Models\Recruiter;
use App\Models\Vacancy;

class EnterpriseController extends Controller
{
    public function index(){
        $enterprises =  Enterprise::all();
        return view('enterprises.index',compact('enterprises'));
    }
    public function create(){
        // $skills =  Vacancy::SKILLS;
        // $categories =  Category::all();
        // $subcategories =  Subcategory::all();
        $cities =  City::all();
        // $countries = Country::all();
        // $states = State::all();
        return view('enterprises.create',compact('cities'));
    }

    public function store(StoreEnterpriseRequest $request){

        $validated =  $request->validated();

        $enterprise = DB::transaction(function () use ($validated) {
            return Enterprise::create([
                        'name'          => $validated['name'],
                        'employees'     => $validated['employees'],
                        'sector'        => $validated['sector'],
                        'turn'          => $validated['turn'],
                        'website'       => $validated['website'],
                        'vision'        => $validated['vision'],
                        'description'   => $validated['description'],
                        'rfc'           => $validated['rfc'],
                        'business_name' => $validated['business_name'],
                        'city_id'       => $validated['city_id'],

            ]);
        });

        // $enterprise->logo()->make()->upload($validated['logo'], 'logos/'.$enterprise->id, 'logos');
        user()->photo()->make()->upload($validated['logo'], 'logo/'.user()->id, 'logo');
        $enterprise->user()->save(user());

        return redirect()->route('jobs.index');
    }

    public function show($slug){

        $enterprise = Enterprise::where('slug',$slug)->first();

        $vacancies = Vacancy::whereIn('recruiter_id',$enterprise->recruiters)->get();
       return view('enterprises.show',compact('enterprise','vacancies'));
    }

    public function acceptRecruiter(Request $request){

        $recruiter = Recruiter::find($request->recruiter_id);
        $recruiter->update([
            'enterprise_id' =>profile()->id,
            'status'        =>1
        ]);

        return back();

    }
}
