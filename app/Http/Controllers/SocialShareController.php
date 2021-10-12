<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Jorenvh\Share\Share;
use Illuminate\Http\Request;

class SocialShareController extends Controller
{
    public function share($vacancy,$red){

        $vacancy = Vacancy::find($vacancy);
        $shareButtons = \Share::page(
            'https://www.futurotalento.com',
            $vacancy->title,
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();
        return $shareButtons;
    }
}
