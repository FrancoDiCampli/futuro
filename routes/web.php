<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Auth
Route::middleware(['auth'])->group(function () {

    //Superadmin
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/superadmin',[App\Http\Controllers\ProfileContoller::class,'superadminDashboard'])->name('superadmin.dashboard');
    });

    //Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin',[App\Http\Controllers\ProfileContoller::class,'adminDashboard'])->name('admin.dashboard');
    });

    //Superadmin y Admin
    Route::middleware(['role:admin|superadmin'])->group(function () {
        Route::resource('users',App\Http\Controllers\UserController::class);
    });

    //Student
    Route::middleware(['role:student'])->group(function () {
        Route::get('student-dashboard',[\App\Http\Controllers\StudentController::class,'dashboard'])->name('students.dashboard');
        Route::get('/student',[App\Http\Controllers\ProfileContoller::class,'studentDashboard'])->name('student.dashboard');
        Route::post('postulation',[App\Http\Controllers\JobController::class,'postulation'])->name('postulation');
        Route::resource('vacancies', App\Http\Controllers\VacancyController::class)->except(['index','show']);
        Route::get('vacancies/{slug}',[App\Http\Controllers\VacancyController::class,'show'])->name('vacancies.show');

        Route::resource('enterprises', App\Http\Controllers\EnterpriseController::class)->except(['show']);
        Route::get('enterprises/{slug}',[App\Http\Controllers\EnterpriseController::class,'show'])->name('enterprises.show');

        Route::get('student-profile',[\App\Http\Controllers\StudentController::class,'profile'])->name('student.profile');
    });

    //Recruiter
    Route::middleware(['role:recruiter'])->group(function () {
        Route::get('/recruiter',[App\Http\Controllers\ProfileContoller::class,'recruiterDashboard'])->name('recruiter.dashboard');
        Route::get('recruiter/blocked',[App\Http\Controllers\RecruiterController::class,'blocked'])->name('blocked');
        Route::resource('notes',App\Http\Controllers\NoteController::class);
        Route::get('postulation/{vacancy}',[App\Http\Controllers\PostulationController::class,'index'])->name('postulation.index');
        Route::resource('postulations',App\Http\Controllers\PostulationController::class)->except(['index']);
    });

    //Enterprise
    Route::middleware(['role:recruiter'])->group(function () {
        Route::get('/enterprise',[App\Http\Controllers\ProfileContoller::class,'enterpriseDashboard'])->name('enterprise.dashboard');
        Route::post('accept-recruiter',[App\Http\Controllers\EnterpriseController::class,'acceptRecruiter'])->name('accept.recruiter');
    });


    //Dashboard general
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('recruiters', App\Http\Controllers\RecruiterController::class);
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::resource('jobs',App\Http\Controllers\JobController::class);

    Route::get('vacancies/{filters?}',[App\Http\Controllers\VacancyController::class,'index'])->name('vacancies.index');

    // Test stage
    // Route::resource('messages',App\Http\Controllers\MessageController::class)->middleware(['auth']);

    Route::get('notifications',[App\Http\Controllers\MessageController::class,'index'])->name('all.notifications');
    Route::get('unread-notifications',[App\Http\Controllers\MessageController::class,'unread'])->name('unread.notifications');

    // Route::get('student-dashboard',[\App\Http\Controllers\StudentController::class,'dashboard'])->name('students.dashboard');


    // Portulations
    Route::post('update-postulation-status',[\App\Http\Controllers\PostulationController::class,'updateStatus'])->name('update.postulation.status');
    Route::get('postulations/{vacancy}/{student}',[App\Http\Controllers\VacancyController::class,'getPostulation'])->name('get.postulation');
    Route::post('update-status',[App\Http\Controllers\VacancyController::class,'updateStatus'])->name('update.status');

    Route::get('test',[App\Http\Controllers\TestController::class,'test']);
    Route::post('test',[App\Http\Controllers\TestController::class,'save'])->name('save');
    Route::get('openpay-form',[App\Http\Controllers\TestController::class,'openpayForm']);


    Route::put('update-student-profile/{student}',[App\Http\Controllers\StudentController::class,'updateProfile'])->name('update.student.profile');
    Route::put('update-student-education/{student}',[App\Http\Controllers\StudentController::class,'updateEducation'])->name('update.student.education');
    Route::put('update-student-experience/{student}',[App\Http\Controllers\StudentController::class,'updateExerience'])->name('update.student.experience');

    Route::get('pay/{plan}/{card}',[App\Http\Controllers\TestController::class,'pay'])->name('pay');



});

require __DIR__.'/auth.php';
