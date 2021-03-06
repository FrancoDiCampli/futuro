<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Enterprise;
use App\Models\Language;
use App\Models\Postulation;
use App\Models\Recruiter;
use App\Models\Software;
use App\Models\Student;
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
    public function enterpriseDashboard(){
        $enterprise =  Enterprise::find(user()->profile->enterprise_id);

        $cities = City::all();
        // if(!user()->hasEnterpriseProfile) return view('admin.enterprise.complet',compact('cities'));
        $recruiters =  Recruiter::where('enterprise_id',user()->profile->id)->get();

        if($enterprise->main_recruiter === user()->profile->id){

            return view('admin.enterprise.dashboard',compact('recruiters'));
        }
        return redirect()->route('dashboard');
    }
    public function studentDashboard(){
        if(!user()->hasStudentProfile) {
            $student = Student::create();
            $student->user()->save(user());
        };

        return redirect()->route('students.dashboard');
    }
    public function recruiterDashboard(){
        $enterprises = Enterprise::all();
        $cities =  City::all();
        if(!user()->hasRecruiterProfile) return view('admin.recruiter.complet',compact('enterprises','cities'));

        if(user()->profile->status === 0) return view('admin.recruiter.blocked');
        $vacancies = Vacancy::with('students')->where('recruiter_id',user()->profile->id)->paginate(5);
        return view('admin.recruiter.index',compact('vacancies'));
    }
}
