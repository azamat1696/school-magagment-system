<?php

use App\Http\Controllers\LangController;
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


Route::get('lang/home', [LangController::class, 'index']);

Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
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
    Route::resource('qualifications',\App\Http\Controllers\QualificationController::class);
    Route::get('qualifications/{id}/create',[\App\Http\Controllers\QualificationController::class,'create'])->name('qualifications.create');
    Route::post('qualifications/show',[\App\Http\Controllers\QualificationController::class,'show'])->name('qualifications.show');
    Route::resource('countries',\App\Http\Controllers\CountriesController::class);
    Route::resource('departments',\App\Http\Controllers\DepartmentsController::class);
    Route::resource('courses',\App\Http\Controllers\CoursesController::class);
    Route::resource('sections',\App\Http\Controllers\ClassesController::class);
    Route::resource('student-records',\App\Http\Controllers\StudentRecordsController::class);
    Route::get('student-records/{id}/create',[\App\Http\Controllers\StudentRecordsController::class,'create'])->name('student-records.create');
    Route::post('student-records/show',[\App\Http\Controllers\StudentRecordsController::class,'show'])->name('student-records.show');
    Route::resource('transactions',\App\Http\Controllers\TransactionsController::class);
    Route::get('transactions/{id}/create',[\App\Http\Controllers\TransactionsController::class,'create'])->name('transactions.create');
    Route::post('transactions/show',[\App\Http\Controllers\TransactionsController::class,'show'])->name('transactions.show');
    Route::get('ajax/{id}',[\App\Http\Controllers\TransactionsController::class,'ajaxQualification'])->name('ajax');
});


