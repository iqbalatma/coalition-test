<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ProjectController::class)
    ->prefix("/projects")
    ->name("projects.")
    ->group(function (){
        Route::get("/", "index")->name("index");
    });
    
Route::controller(TaskController::class)
    ->prefix("/tasks")
    ->name("tasks.")
    ->group(function (){
        Route::get("/", "index")->name("index");
    });