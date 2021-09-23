<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Recruiter;
use App\Models\Enterprise;
use App\Models\Postulation;
use Illuminate\Http\Request;
use App\Http\Traits\FileTrait;
use App\Models\Vacancy;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use PhpParser\Node\Expr\PostInc;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TestController extends Controller
{
    use FileTrait;

    public function test(){

        $job = Postulation::first();
        return $job->vacancy->expired;

    }
}
