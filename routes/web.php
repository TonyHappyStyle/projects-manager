<?php

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


Route::get('/',"App\Http\Controllers\HomeController@index"); 

Route::get('/project/{id}',"App\Http\Controllers\ProjectsController@index")->name("project");
Route::get('/module/{id}',"App\Http\Controllers\ModulesController@index")->name("module");