<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\Admin\Manage_Personnel;
use App\Http\Controllers\Admin\Datatable\Personneltb;
use App\Http\Controllers\Admin\Datatable\Executivetb;
use App\Http\Controllers\Admin\Datatable\Stafftb;
use App\Http\Controllers\Admin\Manage_Staff;
use App\Http\Controllers\Admin\Manage_Executive;
use App\Http\Controllers\Admin\Manage_Year;
use App\Http\Controllers\Admin\Datatable\Yeartb;
use App\Http\Controllers\Admin\Manage_Strategics;
use App\Http\Controllers\Admin\Datatable\Strategicstb;
use App\Http\Controllers\Admin\Manage_Tactics;
use App\Http\Controllers\Admin\Datatable\Tacticstb;

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

     // Year
    Route::get('/year',[Yeartb::class,"show"])->name("table_Year");
    Route::post('/dataper',[Yeartb::class,"getdata"])->name("datayear"); 

    Route::get('/show/{id}/year','Index@formshowyear')->name("show_year");
    Route::get('add/year','Index@formaddyear')->name("add_year");
    Route::get('/edit/{id}/year','Index@formedityear')->name("edit_year");
    Route::get('/editpassword/{id}/year','Index@formeditpasswordyear')->name("editpassword_year");

    Route::post('add/year',[Manage_Year::class,'addyear'])->name("add_yearl_post");
    Route::post('edit/year',[Manage_Year::class,'edityear'])->name("edit_year_post");
    Route::post('editpassword/year',[Manage_Year::class,'editpasswordyear'])->name("editpassword_year_post");
    Route::post('delete/year',[Manage_Year::class,'deleteyear'])->name("delete_year_post");
     // end Year

 // Strategics
    Route::get('/strategics',[Strategicstb::class,"show"])->name("table_Strategics");
    Route::post('/dataper',[Strategicstb::class,"getdata"])->name("datastrategics");


    Route::get('/show/{id}/strategics','Index@formshowstrategics')->name("show_strategics");
    Route::get('add/strategicsl','Index@formaddstrategics')->name("add_strategics");
    Route::get('/edit/{id}/strategics','Index@formeditstrategics')->name("edit_strategics");
    Route::get('/editpassword/{id}/strategics','Index@formeditpasswordstrategics')->name("editpassword_strategics");

    Route::post('add/strategics',[Manage_Strategics::class,'addstrategics'])->name("add_strategics_post");
    Route::post('edit/strategics',[Manage_Strategics::class,'editstrategics'])->name("edit_strategics_post");
    Route::post('editpassword/strategics',[Manage_Strategics::class,'editpasswordstrategics'])->name("editpassword_strategics_post");
    Route::post('delete/strategics',[Manage_Strategics::class,'deletestrategics'])->name("delete_strategics_post");
    // end Strategics
    
 // Tactics
    Route::get('/tactics',[Tacticstb::class,"show"])->name("table_Tactics");
    Route::post('/dataper',[Tacticstb::class,"getdata"])->name("datatactics"); 

    Route::get('/show/{id}/tactics','Index@formshowtactics')->name("show_tactics");
    Route::get('add/tactics','Index@formaddtactics')->name("add_tactics");
    Route::get('/edit/{id}tactics','Index@formedittactics')->name("edit_tactics");
    Route::get('/editpassword/{id}/tactics','Index@formeditpasswordtactics')->name("editpassword_tactics");

    Route::post('add/tactics',[Manage_Tactics::class,'addtacticsl'])->name("add_tactics_post");
    Route::post('edit/tactics',[Manage_Tactics::class,'edittactics'])->name("edit_tactics_post");
    Route::post('editpassword/tactics',[Manage_Tactics::class,'editpasswordtactics'])->name("editpassword_tactics_post");
    Route::post('delete/tacticsl',[Manage_Tactics::class,'deletetactics'])->name("delete_tactics_post");
     // end Tactics
    
    
    



});





Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('showlogin');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
