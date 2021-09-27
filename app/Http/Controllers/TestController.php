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
        $postulation = Postulation::find(7);
        return $postulation->vacancy->recruiter->fullname;
        // $user = User::find(7);
        // Notification::sendNow($user,new PostulationRejected());
        // Mail::to('francodicampli@gmail.com')->send(new PostulationRejected('lo siento'));

        return 'done';
    }
}
