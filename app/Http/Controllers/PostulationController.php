<?php

namespace App\Http\Controllers;

use App\Models\Postulation;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class PostulationController extends Controller
{
    public function index($vacancy){
        $postulations = Postulation::where('vacancy_id',$vacancy)->get();
        $vacancy = Vacancy::find($vacancy);
       return view('postulations.index',compact('postulations','vacancy'));
    }

    public function show(Postulation $postulation){


        return view('postulations.show',compact('postulation'));

    }

    public function updateStatus(Request $request){
      $postulation = Postulation::find($request->postulation);

      $postulation->update([
          'status'  =>$request->status
      ]);

      return redirect()->route('recruiters.index');
    }
}
