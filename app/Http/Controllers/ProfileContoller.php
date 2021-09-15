<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Language;
use App\Models\Software;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileContoller extends Controller
{
    public function __construct(){

    }

    public function superadminDashboard(){
        return view('admin.superadmin');
    }
    public function adminDashboard(){
        return view('admin.admin');
    }
    public function empresaDashboard(){
        $cities = City::all();
        if(!user()->hasEmpresaProfile) return view('admin.empresa.complet',compact('cities'));
        return view('admin.empresa.dashboard');
    }
    public function estudianteDashboard(){
        $skills =  Vacancy::SKILLS;
        $categories =  Category::all();
        $subcategories =  Subcategory::all();
        $cities =  City::all();
        $countries = Country::all();
        $states = State::all();
        $languages = Language::all();
        $software = Software::all();
        if(!user()->hasEstudianteProfile) return view('admin.estudiante.complet',compact('categories','subcategories','countries','states','cities','skills','languages','software'));
        return view('admin.estudiante');
    }
    public function reclutadorDashboard(){
        if(!user()->hasReclutadorProfile) return view('admin.reclutador.complet');
        return view('admin.reclutador');
    }
}
