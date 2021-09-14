<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if(!user()->hasEmpresaProfile) return view('admin.empresa.complet');
        return view('admin.empresa.dashboard');
    }
    public function estudianteDashboard(){
        if(!user()->hasEstudianteProfile) return view('admin.estudiante.complet');
        return view('admin.estudiante');
    }
    public function reclutadorDashboard(){
        if(!user()->hasReclutadorProfile) return view('admin.reclutador.complet');
        return view('admin.reclutador');
    }
}
