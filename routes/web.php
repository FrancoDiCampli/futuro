<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {
   Route::get('/superadmin',[App\Http\Controllers\ProfileContoller::class,'superadminDashboard'])->name('superadmin.dashboard');
   Route::get('/admin',[App\Http\Controllers\ProfileContoller::class,'adminDashboard'])->name('admin.dashboard');
   Route::get('/estudiante',[App\Http\Controllers\ProfileContoller::class,'estudianteDashboard'])->name('estudiante.dashboard');
   Route::get('/empresa',[App\Http\Controllers\ProfileContoller::class,'empresaDashboard'])->name('empresa.dashboard');
   Route::get('/reclutador',[App\Http\Controllers\ProfileContoller::class,'reclutadorDashboard'])->name('reclutador.dashboard');

   Route::post('postulation',[App\Http\Controllers\JobController::class,'postulation'])->name('postulation');

   Route::get('recruiter/blocked',[App\Http\Controllers\RecruiterController::class,'blocked'])->name('blocked');

   Route::post('accept-recruiter',[App\Http\Controllers\EnterpriseController::class,'acceptRecruiter'])->name('accept.recruiter');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::view('main','layouts.main');

Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('enterprises', App\Http\Controllers\EnterpriseController::class)->middleware(['auth']);
Route::resource('recruiters', App\Http\Controllers\RecruiterController::class)->middleware(['auth']);
Route::resource('students', App\Http\Controllers\StudentController::class)->middleware(['auth']);
Route::resource('vacancies', App\Http\Controllers\VacancyController::class)->middleware(['auth']);

Route::resource('jobs',App\Http\Controllers\JobController::class)->middleware(['auth']);
Route::resource('users',App\Http\Controllers\UserController::class)->middleware(['auth']);

Route::get('postulations/{vacancy}/{student}',[App\Http\Controllers\VacancyController::class,'getPostulation'])->name('get.postulation');
Route::post('update-status',[App\Http\Controllers\VacancyController::class,'updateStatus'])->name('update.status');
Route::get('test',[App\Http\Controllers\TestController::class,'test']);

require __DIR__.'/auth.php';
