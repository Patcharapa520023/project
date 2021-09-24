<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Year;
use App\Models\Offer;
use App\Models\Strategic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function formedityear(Request $request){
       $data=Year::find(base64_decode($request->id));
        //เก็บไว้เทสนะอิอิ    dd($data->toArray());
       return view('page2.year.button.edityear',compact('data'));
    }
    // end formyear

     // formstrategic
     public function formaddstrategic(Request $request){
        $listyear =  Year::orderBy('start','DESC')->get();
        return view('page2.strategic.button.addstrategic',compact('listyear'));
    }
    public function formeditstrategic(Request $request){
       $data= Strategic::find($request->id);

    //    dd($data->toArray());
        //เก็บไว้เทสนะอิอิ    dd($data->toArray());
        $listyear =  Year::orderBy('start','DESC')->get();
        $mateyear =  $listyear->firstWhere('id',$data['year_id']);
       return view('page2.strategic.button.editstrategic',compact('listyear','data','mateyear'));
    }
    // end formstrategic

    // formoffer
    public function formshowoffer(Request $request){
        $data=Offer::with('offer')->find(base64_decode($request->id));
         return view('page2.offer.button.button.showoffer',compact('data'));
     }
     public function formeditoffer(Request $request){
         $data=Offer::with('offer')->find(base64_decode($request->id));
          //เก็บไว้เทสนะอิอิ    dd($data->toArray());
         return view('page2.offer.button.button.editoffer',compact('data'));
      }
      public function formaddoffer(Request $request){
         return view('page2.offer.button.button.addoffer');
     }
     // end formoffer
}


