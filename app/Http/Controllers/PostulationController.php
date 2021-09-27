<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Vacancy;
use App\Models\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\PostulationRejected;
use App\Mail\PostulationRejected as byMail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostulationRejected as byNotification;

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

      if($request->status === 'rejected') {

          $message = [
              'title' => 'Perdon, fuiste rechazado en tu postulacion'.$postulation->vacancy->title,
              'content' => '
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae totam quam omnis tenetur, doloremque recusandae vitae? Rerum earum quaerat, assumenda sit, eaque laborum dignissimos sapiente eius iure odio, in vero.',
              'sender'   =>$postulation->vacancy->recruiter->fullname,
          ];

          $user = User::find($postulation->student->user->id);

          Notification::sendNow($user,new PostulationRejected($message));

      }


      $postulation->update([
          'status'  =>$request->status
      ]);

      return back();
    }
}
