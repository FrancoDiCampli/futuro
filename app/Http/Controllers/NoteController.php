<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Postulation;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request){
        $postulation = Postulation::find($request->postulation);

      Note::create([
        'content'           => $request->content,
        'postulation_id'    =>$postulation->id
      ]);

      return back();
    }
}
