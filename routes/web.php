<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\Admin\Manage_Personnel;
use App\Http\Controllers\Admin\Datatable\Personneltb;
use App\Http\Controllers\Admin\Datatable\Executivetb;
use App\Http\Controllers\Admin\Datatable\Stafftb;
use App\Http\Controllers\Admin\Datatable\Yeartb;
use App\Http\Controllers\Admin\Datatable\Strategictb;
use App\Http\Controllers\Admin\Manage_Staff;
use App\Http\Controllers\Admin\Manage_Executive;
use App\Http\Controllers\Admin\Manage_Year;
use App\Http\Controllers\Admin\Manage_Strategic;

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

    // staff
    Route::get('/staff',[Stafftb::class,"show"])->name("table_Staff");
    Route::post('/datastaff',[Stafftb::class,"getdata"])->name("datastaff");

    Route::get('/show/{id}/staff','Index@formshowstaff')->name("show_staff");
    Route::get('add/staff','Index@formaddstaff')->name("add_staff");
    Route::get('/edit/{id}/staff','Index@formeditstaff')->name("edit_staff");
    Route::get('/editpassword/{id}/staff','Index@formeditpasswordstaff')->name("editpassword_staff");

    Route::post('delete/staff',[Manage_Staff::class,'deletestaff'])->name("delete_staff_post");
    Route::post('add/staff',[Manage_Staff::class,'addstaff'])->name("add_staff_post");
    Route::post('edit/staff',[Manage_Staff::class,'editstaff'])->name("edit_staff_post");
    Route::post('editpassword/staff',[Manage_Staff::class,'editpasswordstaff'])->name("editpassword_staff_post");
    // end staff

    // executive
    Route::get('/executive',[Executivetb::class,"show"])->name("table_Executive");
    Route::post('/dataexecutive',[Executivetb::class,"getdata"])->name("dataexecutive");

    Route::get('/show/{id}/executive','Index@formshowexecutive')->name("show_executive");
    Route::get('add/executive','Index@formaddexecutive')->name("add_executive");
    Route::get('/edit/{id}/executive','Index@formeditexecutive')->name("edit_executive");
    Route::get('/editpassword/{id}/executive','Index@formeditpasswordexecutive')->name("editpassword_executive");

    Route::post('delete/executive',[Manage_Executive::class,'deleteexecutive'])->name("delete_executive_post");
    Route::post('add/executive',[Manage_Executive::class,'addexecutive'])->name("add_executive_post");
    Route::post('edit/executive',[Manage_Executive::class,'editexecutive'])->name("edit_executive_post");
    Route::post('editpassword/executive',[Manage_Executive::class,'editpasswordexecutive'])->name("editpassword_executive_post");

    // end executive

    // personnel
    Route::get('/personnel',[Personneltb::class,"show"])->name("table_Personnel");
    Route::post('/datapersonnel',[Personneltb::class,"getdata"])->name("datapersonnel");


    Route::get('/show/{id}/personnel','Index@formshowpersonnel')->name("show_personnel");
    Route::get('add/personnel','Index@formaddpersonnel')->name("add_personnel");
    Route::get('/edit/{id}/personnel','Index@formeditpersonnel')->name("edit_personnel");
    Route::get('/editpassword/{id}/personnel','Index@formeditpasswordpersonnel')->name("editpassword_personnel");

    Route::post('add/personnel',[Manage_Personnel::class,'addpersonnel'])->name("add_personnel_post");
    Route::post('edit/personnel',[Manage_Personnel::class,'editpersonnel'])->name("edit_personnel_post");
    Route::post('editpassword/personnel',[Manage_Personnel::class,'editpasswordpersonnel'])->name("editpassword_personnel_post");
    Route::post('delete/personnel',[Manage_Personnel::class,'deletepersonnel'])->name("delete_personnel_post");
    // end personel

    
    // year
    Route::get('/year',[Yeartb::class,"show"])->name("table_Year");
    Route::post('/datayear',[Yeartb::class,"getdata"])->name("datayear");

    Route::get('/show/{id}/year','Index@formshowyear')->name("show_year");
    Route::get('add/year','Index@formaddyear')->name("add_year");
    Route::get('/edit/{id}/year','Index@formedityear')->name("edit_year");


    Route::post('delete/year',[Manage_Year::class,'deleteyear'])->name("delete_year_post");
    Route::post('add/year',[Manage_Year::class,'addyear'])->name("add_year_post");
    Route::post('edit/year',[Manage_Year::class,'edityear'])->name("edit_year_post");
    // end year

   // strategic
    Route::get('/strategic',[Strategictb::class,"show"])->name("table_Strategic");
    Route::post('/datastrategic',[Strategictb::class,"getdata"])->name("datastrategic");

    Route::get('/show/{id}/strategic','Index@formshowstrategic')->name("show_strategic");
    Route::get('add/strategic','Index@formaddstrategic')->name("add_strategic");
    Route::get('/edit/{id}/strategic','Index@formeditstrategic')->name("edit_strategic");


    Route::post('delete/strategic',[Manage_Strategic::class,'deletestrategic'])->name("delete_strategic_post");
    Route::post('add/strategic',[Manage_Strategic::class,'addstrategic'])->name("add_strategic_post");
    Route::post('edit/strategic',[Manage_Strategic::class,'editstrategic'])->name("edit_strategic_post");
    // end strategic

    /*// strategic
    Route::get('/strategic',[Strategictb::class,"show"])->name("table_Year");
    Route::post('/datastrategic',[Strategictb::class,"getdata"])->name("datastrategic");

    Route::get('/show/{id}/strategic','Index@formshowstrategic')->name("show_strategic");
    Route::get('add/strategic','Index@formaddstrategic')->name("add_strategic");
    Route::get('/edit/{id}/ystrategic','Index@formeditstrategic')->name("edit_strategic");


    Route::post('delete/strategic',[Manage_Strategic::class,'deletestrategic'])->name("delete_strategic_post");
    Route::post('add/strategic',[Manage_Strategic::class,'addstrategic'])->name("add_strategic_post");
    Route::post('edit/strategic',[Manage_Strategic::class,'editstrategic'])->name("edit_strategic_post");
    // end strategic
*/



});





Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('showlogin');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
