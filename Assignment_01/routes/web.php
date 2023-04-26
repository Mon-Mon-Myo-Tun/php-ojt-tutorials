<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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


Route::get('/createmajor',[StudentController::class,'CreateMajor'])->name('create#major');
Route::post('/addmajor',[StudentController::class,'AddMajor'])->name('add#major');
Route::get('/showmajorlist',[StudentController::class,'ShowMajorList'])->name('show#list');
Route::get('/editmajor/{id}/edit',[StudentController::class,'EditMajor'])->name('major#edit');
Route::put('/editmajor/{id}', [StudentController::class, 'UpdateMajor'])->name('update#major');
Route::delete('/showmajor/{majors}',[StudentController::class,'RemoveMajor'])->name('major#remove');

Route::get('/createstudent',[StudentController::class,'CreateStudent'])->name('create#student');
Route::post('/addstudent',[StudentController::class,'AddStudent'])->name('add#student');
Route::get('/',[StudentController::class,'ShowStudentList'])->name('student#list');
Route::get('/editstudent/{id}/edit',[StudentController::class,'EditStudentList'])->name('edit#student');
Route::put('/editstudent/{id}', [StudentController::class, 'UpdateStudent'])->name('update#student');
Route::delete('/studentlist/{students}',[StudentController::class,'RemoveStudent'])->name('remove#student');


