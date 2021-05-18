<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/หน้าแรก',[HomeController::class,'pageindex'])->name("home");

Route::get('/companies',[HomeController::class,'pagecompanies'])->name("stategic");

Route::get('/recurments',[HomeController::class,'pagerecurments'])->name("project");

Route::get('/searchjob',[HomeController::class,'pagesearchjob'])->name("summarize");

Route::get('/services',[HomeController::class,'pageservices'])->name("results");

Route::get('/',[HomeController::class,'pageservices'])->name("Tactics");

Route::get('/',view("page.reset"))->name("reset");





 Auth::routes();
