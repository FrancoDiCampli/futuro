<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;



Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {
   Route::get('/superadmin',[App\Http\Controllers\ProfileContoller::class,'superadminDashboard'])->name('superadmin.dashboard');
   Route::get('/admin',[App\Http\Controllers\ProfileContoller::class,'adminDashboard'])->name('admin.dashboard');
   Route::get('/estudiante',[App\Http\Controllers\ProfileContoller::class,'estudianteDashboard'])->name('estudiante.dashboard');
   Route::get('/empresa',[App\Http\Controllers\ProfileContoller::class,'empresaDashboard'])->name('empresa.dashboard');
   Route::get('/reclutador',[App\Http\Controllers\ProfileContoller::class,'reclutadorDashboard'])->name('reclutador.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('test',function(){
    return Auth::user()->roles->first()->name;
});

Route::view('main','layouts.main');

Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('enterprises', App\Http\Controllers\EnterpriseController::class)->middleware(['auth']);

Route::resource('jobs',JobController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
