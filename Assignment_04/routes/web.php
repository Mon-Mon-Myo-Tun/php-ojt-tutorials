<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;


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



Route::get('/createmajor',[MajorController::class,'create'])->name('create#major');
Route::post('/addmajor',[MajorController::class,'store'])->name('add#major');
Route::get('/showmajorlist',[MajorController::class,'show'])->name('show#list');
Route::get('/editmajor/{id}/edit',[MajorController::class,'edit'])->name('major#edit');
Route::put('/editmajor/{id}', [MajorController::class, 'update'])->name('update#major');
Route::delete('/showmajor/{id}',[MajorController::class,'destory'])->name('major#remove');

Route::get('/createstudent',[StudentController::class,'create'])->name('create#student');
Route::post('/addstudent',[StudentController::class,'store'])->name('add#student');
Route::get('/',[StudentController::class,'show'])->name('student#list');
Route::get('/editstudent/{id}/edit',[StudentController::class,'edit'])->name('edit#student');
Route::put('/editstudent/{id}', [StudentController::class, 'update'])->name('update#student');
Route::delete('/studentlist/{id}',[StudentController::class,'destory'])->name('remove#student');


