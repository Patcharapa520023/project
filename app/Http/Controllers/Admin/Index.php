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
        return view('page2.table.table_personnel',compact('tables'));
    }
    public function tableyear(){
        $tables = User::joinyear();
        return view('page2.table.table_year',compact('tables'));
    }
    public function tablestrategic(){
        $tables = User::joinyear();
        return view('page2.table.table_strategic',compact('tables'));
    }

        // formpersonnel
    public function formaddpersonnel(Request $request){
        return view('page2.personnel.button.addpersonnel');
    }
    public function formshowpersonnel(Request $request){
       $data=User::with('personnel')->find(base64_decode($request->id));
        return view('page2.personnel.button.showpersonnel',compact('data'));
    }
    public function formeditpersonnel(Request $request){
       $data=User::with('personnel')->find(base64_decode($request->id));
        //เก็บไว้เทสนะอิอิ    dd($data->toArray());
       return view('page2.personnel.button.editpersonnel',compact('data'));
    }
    public function formeditpasswordpersonnel(Request $request){
       $data=User::with('personnel')->find(base64_decode($request->id));
        return view('page2.personnel.button.editpasswordpersonnel',compact('data'));
    }
    // end formpersonnel

        // formstaff
    public function formshowstaff(Request $request){
       $data=User::with('staff')->find(base64_decode($request->id));
        return view('page2.staff.button.showstaff',compact('data'));
    }
    public function formaddstaff(Request $request){
        return view('page2.staff.button.addstaff');
    }
    public function formeditstaff(Request $request){
        $data=User::with('staff')->find(base64_decode($request->id));
         //เก็บไว้เทสนะอิอิ    dd($data->toArray());
        return view('page2.staff.button.editstaff',compact('data'));
     }
     public function formeditpasswordstaff(Request $request){
        $data=User::with('staff')->find(base64_decode($request->id));
         return view('page2.staff.button.editpasswordstaff',compact('data'));
     }
    // end formstaff

        // formexecutive
     public function formshowexecutive(Request $request){
       $data=User::with('executive')->find(base64_decode($request->id));
        return view('page2.executive.button.showexecutive',compact('data'));
    }
    public function formexecutive(Request $request){
        return view('page2.executive.button.addexecutive');
    }
    public function formeditexecutive(Request $request){
        $data=User::with('executive')->find(base64_decode($request->id));
         //เก็บไว้เทสนะอิอิ    dd($data->toArray());
        return view('page2.executive.button.editexecutive',compact('data'));
     }
     public function formeditpasswordexecutive(Request $request){
        $data=User::with('executive')->find(base64_decode($request->id));
         return view('page2.executive.button.editpasswordexecutive',compact('data'));
     }
     public function formaddexecutive(Request $request){
        return view('page2.executive.button.addexecutive');
    }
    // end formexecutive

     // formyear
     public function formaddyear(Request $request){
        return view('page2.year.button.addyear');
    }
    public function formshowyear(Request $request){
       $data=User::with('year')->find(base64_decode($request->id));
        return view('page2.year.button.showyear',compact('data'));
    }
    public function formedityear(Request $request){
       $data=User::with('year')->find(base64_decode($request->id));
        //เก็บไว้เทสนะอิอิ    dd($data->toArray());
       return view('page2.year.button.edityear',compact('data'));
    }
    // end formyear

     // formyear
     public function formaddstrategic(Request $request){
        return view('page2.year.button.addstrategic');
    }
    public function formshowstrategic(Request $request){
       $data=User::with('strategic')->find(base64_decode($request->id));
        return view('page2.strategic.button.showstrategic',compact('data'));
    }
    public function formeditstrategic(Request $request){
       $data=User::with('strategic')->find(base64_decode($request->id));
        //เก็บไว้เทสนะอิอิ    dd($data->toArray());
       return view('page2.strategicr.button.editstrategic',compact('data'));
    }
    // end formyear
}


