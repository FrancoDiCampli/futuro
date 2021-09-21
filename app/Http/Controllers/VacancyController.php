<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Postulation;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index(){
        return 'index';
    }
    public function show(Vacancy $vacancy){

       return view('vacancy.show',compact('vacancy'));

    }

    public function getPostulation($vacancy,$student){
        $postulation =  Postulation::where('student_id',$student)->where('vacancy_id',$vacancy)->first();

        return view('postulations.show',compact('postulation'));

    }

    public function updateStatus(Request $request){

        $postulation = Postulation::find($request->postulation_id);
        $postulation->state = $request->status;
        $postulation->save();
        return redirect()->route('vacancies.show',$postulation->vacancy_id);
    }
}
