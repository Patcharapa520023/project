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
    public function tablestrategics(){
        return view('page2.table_Strategics');
    }
    public function tabletactics(){
        return view('page2.table_Tactics');
    }
    public function tableyear(){
        $tables = User::joinyear();
        return view('page2.table.tableyear',compact('tables'));

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

        // formeyear
     public function formshowyear(Request $request){
       $data=User::with('year')->find(base64_decode($request->id));
        return view('page2.year.button.showyear',compact('data'));
    }
    public function formyear(Request $request){
        return view('page2.year.button.addyear');
    }
    public function formeditexyear(Request $request){
        $data=User::with('year')->find(base64_decode($request->id));
         //เก็บไว้เทสนะอิอิ    dd($data->toArray());
        return view('page2.year.button.edityear',compact('data'));
     }
     public function formeditpasswordyear(Request $request){
        $data=User::with('year')->find(base64_decode($request->id));
         return view('page2.year.button.editpasswordyear',compact('data'));
     }
     public function formaddyear(Request $request){
        return view('page2.year.button.addyear');
    }
    // end formyear

     // formstrategics
     public function formaddstrategics(Request $request){
        return view('page2.strategics.button.addstrategics');
    }
    public function formshowstrategics(Request $request){
       $data=User::with('strategics')->find(base64_decode($request->id));
        return view('page2.strategics.button.showstrategics',compact('data'));
    }
    public function formeditstrategics(Request $request){
       $data=User::with('strategics')->find(base64_decode($request->id));
        //เก็บไว้เทสนะอิอิ    dd($data->toArray());
       return view('page2.strategics.button.editstrategics',compact('data'));
    }
    // end formstrategics

      // formtactics
      public function formshowtactics(Request $request){
        $data=User::with('tactics')->find(base64_decode($request->id));
         return view('page2.tactics.button.showtactics',compact('data'));
     }
     public function formtactics(Request $request){
         return view('page2.tactics.button.addtactics');
     }
     public function formedittactics(Request $request){
         $data=User::with('tactics')->find(base64_decode($request->id));
          //เก็บไว้เทสนะอิอิ    dd($data->toArray());
         return view('page2.tactics.button.edittactics',compact('data'));
      }
      public function formeditpasswordtactics(Request $request){
         $data=User::with('tactics')->find(base64_decode($request->id));
          return view('page2.tactics.button.editpasswordtactics',compact('data'));
      }
      public function formaddtactics(Request $request){
         return view('page2.tactics.button.addtactics');
     }
     // end formtactics
}


