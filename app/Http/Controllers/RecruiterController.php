<?php

namespace App\Http\Controllers;

use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRecruiterRequest;
use App\Models\Enterprise;
use App\Models\Vacancy;

class RecruiterController extends Controller
{



    public function store(StoreRecruiterRequest $request){

        $validated =  $request->validated();

        $recruiter = DB::transaction(function () use ($validated) {
            return Recruiter::create([
                                'first_name'            =>$validated['first_name'],
                                'last_name'             =>$validated['last_name'],
                                'phone'                 =>$validated['phone'],
                                'belong_enterprise'     =>$validated['belong_enterprise'],
                                'enterprise_id'         => intval($validated['enterprise_id']),
                                'city_id'               => intval($validated['city_id']),
                                'status'                => intval($validated['status']),
            ]);
        });

        // $recruiter->avatar()->make()->upload($validated['avatar'], 'avatar/'.$recruiter->id, 'avatar');
        user()->photo()->make()->upload($validated['avatar'], 'avatar/'.user()->id, 'avatar');
        $recruiter->user()->save(user());
        user()->assignRole('recruiter');
        return redirect()->route('blocked');
    }

    public function index(){
        $enterprise = Enterprise::first();
        $vacancies = Vacancy::where('recruiter_id',user()->profile->id)->paginate(5);
        return view('admin.recruiter.index',compact('enterprise','vacancies'));
    }

    public function blocked(){
        return view('admin.recruiter.blocked');
    }



}
