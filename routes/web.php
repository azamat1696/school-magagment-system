<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('/users')->group(function (){
    Auth::routes();
    Route::get('/', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('user.index');
    Route::get('/edit/{id}', [\App\Http\Controllers\Auth\RegisterController::class,'edit'])->name('user.edit');
    Route::delete('/delete/{id}', [\App\Http\Controllers\Auth\RegisterController::class,'destroy'])->name('user.destroy');
    Route::put('/update/{id}', [\App\Http\Controllers\Auth\RegisterController::class,'update'])->name('user.update');
});

Route::group(['middleware' => ['auth']],function (){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('academic-year',\App\Http\Controllers\AcademicYearController::class);
    Route::resource('semesters',\App\Http\Controllers\SemesterController::class);
    Route::resource('students',\App\Http\Controllers\StudentsController::class);
});


