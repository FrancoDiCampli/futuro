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
                                'first_name'    =>$validated['first_name'],
                                'last_name'     =>$validated['last_name'],
                                'phone'         =>$validated['phone'],
                                'enterprise_id' => intval($validated['enterprise_id']),
            ]);
        });

        $recruiter->avatar()->make()->upload($validated['avatar'], 'avatar/'.$recruiter->id, 'avatar');

        $recruiter->user()->save(user());

        return redirect()->route('reclutador.dashboard');
    }

    public function index(){
        $enterprise = Enterprise::first();
        $vacancies = Vacancy::where('recruiter_id',user()->profile->id)->get();
        return view('admin.reclutador.index',compact('enterprise','vacancies'));
    }
}
