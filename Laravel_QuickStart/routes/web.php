<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/',[TaskController::class,'show'])->name('show#list');
Route::post('/taskList',[TaskController::class,'task'])->name('task#list');
Route::delete('/taskList/{id}',[TaskController::class,'remove'])->name('remove#list');