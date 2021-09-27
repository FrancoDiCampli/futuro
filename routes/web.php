<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {
    // Profiles filtered by status
   Route::get('/superadmin',[App\Http\Controllers\ProfileContoller::class,'superadminDashboard'])->name('superadmin.dashboard');
   Route::get('/admin',[App\Http\Controllers\ProfileContoller::class,'adminDashboard'])->name('admin.dashboard');
   Route::get('/student',[App\Http\Controllers\ProfileContoller::class,'studentDashboard'])->name('student.dashboard');
   Route::get('/enterprise',[App\Http\Controllers\ProfileContoller::class,'enterpriseDashboard'])->name('enterprise.dashboard');
   Route::get('/recruiter',[App\Http\Controllers\ProfileContoller::class,'recruiterDashboard'])->name('recruiter.dashboard');

   Route::get('recruiter/blocked',[App\Http\Controllers\RecruiterController::class,'blocked'])->name('blocked');
   Route::post('accept-recruiter',[App\Http\Controllers\EnterpriseController::class,'acceptRecruiter'])->name('accept.recruiter');

   Route::post('postulation',[App\Http\Controllers\JobController::class,'postulation'])->name('postulation');


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::view('main','layouts.main');

Route::resource('users',App\Http\Controllers\UserController::class)->middleware(['auth']);
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('enterprises', App\Http\Controllers\EnterpriseController::class)->middleware(['auth']);
Route::resource('recruiters', App\Http\Controllers\RecruiterController::class)->middleware(['auth']);
Route::resource('students', App\Http\Controllers\StudentController::class)->middleware(['auth']);
Route::resource('vacancies', App\Http\Controllers\VacancyController::class)->middleware(['auth']);
Route::resource('jobs',App\Http\Controllers\JobController::class)->middleware(['auth']);
Route::resource('notes',App\Http\Controllers\NoteController::class)->middleware(['auth']);




// Test stage
// Route::resource('messages',App\Http\Controllers\MessageController::class)->middleware(['auth']);

Route::get('notifications',[App\Http\Controllers\MessageController::class,'index'])->name('all.notifications');
Route::get('unread-notifications',[App\Http\Controllers\MessageController::class,'unread'])->name('unread.notifications');

Route::get('student-dashboard',[\App\Http\Controllers\StudentController::class,'dashboard'])->name('students.dashboard');
Route::get('student-profile',[\App\Http\Controllers\StudentController::class,'profile'])->name('student.profile');

// Portulations
Route::get('postulation/{vacancy}',[App\Http\Controllers\PostulationController::class,'index'])->name('postulation.index');
Route::resource('postulations',App\Http\Controllers\PostulationController::class)->except(['index'])->middleware(['auth']);
Route::post('update-postulation-status',[\App\Http\Controllers\PostulationController::class,'updateStatus'])->name('update.postulation.status');

Route::get('postulations/{vacancy}/{student}',[App\Http\Controllers\VacancyController::class,'getPostulation'])->name('get.postulation');
Route::post('update-status',[App\Http\Controllers\VacancyController::class,'updateStatus'])->name('update.status');
Route::get('test',[App\Http\Controllers\TestController::class,'test']);

require __DIR__.'/auth.php';
