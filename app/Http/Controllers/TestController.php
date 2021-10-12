<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\File;
use App\Models\User;
use App\Models\Student;
use App\Models\Vacancy;
use App\Models\Recruiter;
use App\Models\Enterprise;
use App\Models\Postulation;
use Illuminate\Http\Request;
use App\Http\Traits\FileTrait;
use App\Models\Subcategory;
use PhpParser\Node\Expr\PostInc;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Notifications\PostulationRejected;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TestController extends Controller
{
    use FileTrait;

    public function test(){

        return view('test.test');
    }


    public function save(Request $request){


        user()->photo()->make()->upload($request->file('photo'), 'avatar/'.user()->id, 'avatar');



        return 'done';
    }
}
