<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
// Route::group(['middleware' => ['role:superadmin']], function () {
//     return view('dashboard');
// });
// Route::group(['middleware' => ['role:admin']], function () {
//     return 'admin';
// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::view('main','layouts.main');

Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('enterprises', App\Http\Controllers\EnterpriseController::class)->middleware(['auth']);

Route::resource('jobs',JobController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
