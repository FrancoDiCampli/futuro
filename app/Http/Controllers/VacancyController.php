<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Vacancy;
use App\Models\Postulation;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index($filters=null){

        $post = user()->profile->vacancies->modelKeys();

        // $filters = [
        //     'city_id'   =>   [1,2,4],
        //     'hiring'   =>   ['Permanente','Por proyecto']
        // ];
        // $vacancies =  Vacancy::Filter($filters)->orderBy('created_at','asc')->paginate(10);

        // return view('vacancy.index',compact('vacancies'));
        return view('vacancy.index');

    }
    public function show(Vacancy $vacancy){
        $show = true;
        $postulation = Postulation::where('status','new')->where('student_id',user()->profile->id)->where('vacancy_id',$vacancy->id)->first();
        if(isset($postulation))  $show = false;


       return view('vacancy.show',compact('vacancy','show'));

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
