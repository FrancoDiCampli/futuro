<?php

namespace App\Http\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

trait Profile
{

    public static function setPersonal($request){

        $aux = 0;
        if($request->filled('first_name')) $aux++;
        if($request->filled('last_name')) $aux++;
        if($request->filled('title')) $aux++;
        if($request->filled('city_id')) $aux++;
        if($request->filled('birthdate')) $aux++;
        if($request->filled('speech')) $aux++;
        if($request->filled('available')) $aux++;
        if($request->filled('preference')) $aux++;
        if($request->filled('hobbies')) $aux++;
        if($request->filled('website')) $aux++;


        return $aux;
    }

    public static function setEducation($request){

        $aux = 0;


        if($request->filled('subcategory_id')) $aux++;
        if($request->filled('experience')) $aux++;
        if($request->filled('university')) $aux++;
        if($request->filled('graduated_at')) $aux++;
        if($request->filled('average')) $aux++;
        if($request->filled('courses')) $aux++;
        if($request->filled('skills')) $aux++;



        return $aux;
    }
}
