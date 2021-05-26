<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\Personnel;
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
Route::get('/web',function(){
    return view('page2.index');
})->name("dashboad");

Route::get('/staff',function(){
    return view('page2.table_Staff');
})->name("table_Staff");

Route::get('/executive',function(){
    return view('page2.table_Executive');
})->name("table_Executive");

Route::get('/personnel',function(){
    $tables = User::joinpersonnel();
    return view('page2.table_Personnel',compact('tables'));
})->name("table_Personnel");

Route::get('add/personnel',function(){
    return view('page2.form.addpersonnel');
})->name("add_personnel");

Route::post('add/personnel',[Personnel::class,'addpersonnel'])->name("add_personnel_post");
Route::post('delete/personnel',[Personnel::class,'deletepersonnel'])->name("delete_personnel_post");


 Auth::routes();
