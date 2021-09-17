<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Recruiter;
use App\Models\Enterprise;
use App\Models\Postulation;
use Illuminate\Http\Request;
use App\Http\Traits\FileTrait;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TestController extends Controller
{
    use FileTrait;

    public function test(){

        // return Vacancy::find(1)->students()->wherePivot('state','new')->get();

        return Vacancy::first();

    }
}
