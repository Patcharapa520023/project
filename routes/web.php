<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\Admin\Manage_Personnel;
use App\Http\Controllers\Admin\Datatable\Personneltb;
use App\Http\Controllers\Admin\Datatable\Executivetb;
use App\Http\Controllers\Admin\Datatable\Stafftb;

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
    Route::post('delete/staff',[Stafftb::class,'deletestaff'])->name("delete_staff_post");

    Route::get('/show/{id}/staff','Index@formshowstaff')->name("show_staff");
    Route::get('add/staff','Index@formaddstaff')->name("add_staff");
    Route::get('/edit/{id}/personnel','Index@formeditpersonnel')->name("edit_personnel");
    Route::get('/editpassword/{id}/personnel','Index@formeditpasswordpersonnel')->name("editpassword_personnel");


    // end staff

    // executive
    Route::get('/executive',[Executivetb::class,"show"])->name("table_Executive");
    Route::post('/dataexe',[Executivetb::class,"getdata"])->name("dataexecutive");
    Route::post('delete/executive',[Executivetb::class,'deleteexecutive'])->name("delete_executive_post");

    // end executive

    // personnel
    Route::get('/personnel',[Personneltb::class,"show"])->name("table_Personnel");
    Route::post('/dataper',[Personneltb::class,"getdata"])->name("datapersonnel");


    Route::get('/show/{id}/personnel','Index@formshowpersonnel')->name("show_personnel");
    Route::get('add/personnel','Index@formaddpersonnel')->name("add_personnel");
    Route::get('/edit/{id}/personnel','Index@formeditpersonnel')->name("edit_personnel");
    Route::get('/editpassword/{id}/personnel','Index@formeditpasswordpersonnel')->name("editpassword_personnel");

    Route::post('add/personnel',[Manage_Personnel::class,'addpersonnel'])->name("add_personnel_post");
    Route::post('edit/personnel',[Manage_Personnel::class,'editpersonnel'])->name("edit_personnel_post");
    Route::post('editpassword/personnel',[Manage_Personnel::class,'editpasswordpersonnel'])->name("editpassword_personnel_post");
    Route::post('delete/personnel',[Manage_Personnel::class,'deletepersonnel'])->name("delete_personnel_post");
    // end personel




});




 Auth::routes();
