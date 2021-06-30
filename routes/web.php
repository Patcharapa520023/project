<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\Personnel;
use App\Http\Controllers\Datatable\Personneltb;
use App\Http\Controllers\Datatable\Executivetb;
use App\Http\Controllers\Datatable\Stafftb;


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

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    // 'as' => 'admin',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']
],function(){
    Route::get('/web','Index@dashbord')->name('dashboad');

    Route::get('/staff',[Stafftb::class,"show"])->name("table_Staff");
    Route::post('/datastaff',[Stafftb::class,"getdata"])->name("datastaff");
    Route::post('delete/staff',[Stafftb::class,'deletestaff'])->name("delete_staff_post");

    Route::get('/executive',[Executivetb::class,"show"])->name("table_Executive");
    Route::post('/dataexe',[Executivetb::class,"getdata"])->name("dataexecutive");
    Route::post('delete/executive',[Executivetb::class,'deleteexecutive'])->name("delete_executive_post");

    Route::get('/personnel',[Personneltb::class,"show"])->name("table_Personnel");
    Route::post('/dataper',[Personneltb::class,"getdata"])->name("datapersonnel");



    Route::get('add/personnel','Index@formaddpersonnel')->name("add_personnel");
Route::get('/show/{id}/personnel','Index@formshowpersonnel')->name("show_personnel");
Route::get('/edit/{id}/personnel','Index@formeditpersonnel')->name("edit_personnel");


    Route::post('add/personnel',[Personnel::class,'addpersonnel'])->name("add_personnel_post");
    Route::post('delete/personnel',[Personnel::class,'deletepersonnel'])->name("delete_personnel_post");
    Route::post('edit/personnel',[Personnel::class,'editpersonnel'])->name("edit_personnel_post");

});

Route::get('/หน้าแรก',[HomeController::class,'pageindex'])->name("home");

Route::get('/companies',[HomeController::class,'pagecompanies'])->name("stategic");

Route::get('/recurments',[HomeController::class,'pagerecurments'])->name("project");

Route::get('/searchjob',[HomeController::class,'pagesearchjob'])->name("summarize");

Route::get('/services',[HomeController::class,'pageservices'])->name("results");

Route::get('/',[HomeController::class,'pageservices'])->name("Tactics");



 Auth::routes();
