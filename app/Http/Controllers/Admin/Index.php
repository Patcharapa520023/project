<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Index extends Controller
{
    public function dashbord(){
        return view('page2.index');
    }
    public function tablestaff(){
        return view('page2.table_Staff');
    }
    public function tableexecutive(){
        return view('page2.table_Executive');
    }
    public function tablepersonnel(){
        $tables = User::joinpersonnel();
        return view('page2.table_Personnel',compact('tables'));
    }
    public function formaddpersonnel(){
        return view('page2.form.addpersonnel');
    }
    public function formshowpersonnel(Request $request){
       $data=User::with('personnel')->find(base64_decode($request->id));
        return view('page2.form.showpersonnel',compact('data'));
    }
    public function formeditpersonnel(Request $request){
       $data=User::with('personnel')->find(base64_decode($request->id));
        return view('page2.form.editpersonnel',compact('data'));
    }
}

