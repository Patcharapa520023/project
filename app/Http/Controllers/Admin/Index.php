<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Year;
use App\Models\Offer;
use App\Models\Tactics;
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
       $data=User::with('personnel')->find($request->id);
        return view('page2.personnel.button.showpersonnel',compact('data'));
    }
    public function formeditpersonnel(Request $request){
       $data=User::with('personnel')->find($request->id);
        //เก็บไว้เทสนะอิอิ    dd($data->toArray());
       return view('page2.personnel.button.editpersonnel',compact('data'));
    }
    public function formeditpasswordpersonnel(Request $request){
       $data=User::with('personnel')->find($request->id);
        return view('page2.personnel.button.editpasswordpersonnel',compact('data'));
    }
    // end formpersonnel

        // formstaff
    public function formshowstaff(Request $request){
       $data=User::with('staff')->find($request->id);
        return view('page2.staff.button.showstaff',compact('data'));
    }
    public function formaddstaff(Request $request){
        return view('page2.staff.button.addstaff');
    }
    public function formeditstaff(Request $request){
        $data=User::with('staff')->find($request->id);
         //เก็บไว้เทสนะอิอิ    dd($data->toArray());
        return view('page2.staff.button.editstaff',compact('data'));
     }
     public function formeditpasswordstaff(Request $request){
        $data=User::with('staff')->find($request->id);
         return view('page2.staff.button.editpasswordstaff',compact('data'));
     }
    // end formstaff

        // formexecutive
     public function formshowexecutive(Request $request){
       $data=User::with('executive')->find($request->id);
        return view('page2.executive.button.showexecutive',compact('data'));
    }
    public function formexecutive(Request $request){
        return view('page2.executive.button.addexecutive');
    }
    public function formeditexecutive(Request $request){
        $data=User::with('executive')->find($request->id);
         //เก็บไว้เทสนะอิอิ    dd($data->toArray());
        return view('page2.executive.button.editexecutive',compact('data'));
     }
     public function formeditpasswordexecutive(Request $request){
        $data=User::with('executive')->find($request->id);
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
       $data=Year::find($request->id);
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
        $data= Offer::where('id',$request->id)->select('*','year as d_year')->get()->load('objective','procedure','time','useful','user','detail_budget','year.strategic.tactic')->first()->toArray();
       if(count($data['objective'])>0){
        $data['objective']  =collect($data['objective'])->map(function($item){
                return $item['name'];
            })->toArray();

      }

      if(count($data['procedure'])>0){
        $data['procedure']  =collect($data['procedure'])->map(function($item){
                return $item['name'];
            })->toArray();

      }
      if(count($data['useful'])>0){
        $data['useful']  =collect($data['useful'])->map(function($item){
                return $item['name'];
            })->toArray();

      }
      if(count($data['time'])>0){
        $data['time']  =collect($data['time'])->map(function($item){
                return [
                    "name" => $item['activity'],
                    "start" => $item['start'],
                    "end" => $item['stop']
                ];
            })->toArray();

      }
      if(count($data['detail_budget'])>0){
        $data['detail_budget']  =collect($data['detail_budget'])->map(function($item){
                return [
                    "detail" => $item['detail'],
                    "price" => $item['amount'],
                ];
            })->toArray();

      }
        $listyear =  Year::orderBy('start','DESC')->get();
       return view('page2.offer.button.showoffer',compact('listyear','data'));
    }

     public function formaddoffer(Request $request){
        $listyear =  Year::orderBy('start','DESC')->get();
        return view('page2.offer.button.addoffer',compact('listyear'));
    }
    public function formeditoffer(Request $request){
       $data= Offer::where('id',$request->id)->select('*','year as d_year')->get()->load('objective','procedure','time','useful','user','detail_budget','year.strategic.tactic')->first()->toArray();
       if(count($data['objective'])>0){
        $data['objective']  =collect($data['objective'])->map(function($item){
                return $item['name'];
            })->toArray();

      }

      if(count($data['procedure'])>0){
        $data['procedure']  =collect($data['procedure'])->map(function($item){
                return $item['name'];
            })->toArray();

      }
      if(count($data['useful'])>0){
        $data['useful']  =collect($data['useful'])->map(function($item){
                return $item['name'];
            })->toArray();

      }
      if(count($data['time'])>0){
        $data['time']  =collect($data['time'])->map(function($item){
                return [
                    "name" => $item['activity'],
                    "start" => $item['start'],
                    "end" => $item['stop']
                ];
            })->toArray();

      }
      if(count($data['detail_budget'])>0){
        $data['detail_budget']  =collect($data['detail_budget'])->map(function($item){
                return [
                    "detail" => $item['detail'],
                    "price" => $item['amount'],
                ];
            })->toArray();

      }
        // Strategic::orderBy('name','DESC')
        // ->where('year_id',$id)
        // ->where('category', ($rolsed=="staff")?1:(($rolsed=="staffd")?2:''))
        // ->select('name','id')
        // ->with('tactic')
        // ->get();
        //เก็บไว้เทสนะอิอิ    dd($data->toArray());
        $listyear =  Year::orderBy('start','DESC')->get();
       return view('page2.offer.button.editoffer',compact('listyear','data'));
    }
    public function formeditsaveresult(Request $request){
       $data= Offer::where('id',$request->id)->select('*','year as d_year')->get()->load('objective','procedure','time','useful','user','detail_budget','year.strategic.tactic')->first()->toArray();
       if(count($data['objective'])>0){
        $data['objective']  =collect($data['objective'])->map(function($item){
                return $item['name'];
            })->toArray();

      }

      if(count($data['procedure'])>0){
        $data['procedure']  =collect($data['procedure'])->map(function($item){
                return $item['name'];
            })->toArray();

      }
      if(count($data['useful'])>0){
        $data['useful']  =collect($data['useful'])->map(function($item){
                return $item['name'];
            })->toArray();

      }
      if(count($data['time'])>0){
        $data['time']  =collect($data['time'])->map(function($item){
                return [
                    "name" => $item['activity'],
                    "start" => $item['start'],
                    "end" => $item['stop']
                ];
            })->toArray();

      }
      if(count($data['detail_budget'])>0){
        $data['detail_budget']  =collect($data['detail_budget'])->map(function($item){
                return [
                    "detail" => $item['detail'],
                    "price" => $item['amount'],
                ];
            })->toArray();

      }
        // Strategic::orderBy('name','DESC')
        // ->where('year_id',$id)
        // ->where('category', ($rolsed=="staff")?1:(($rolsed=="staffd")?2:''))
        // ->select('name','id')
        // ->with('tactic')
        // ->get();
        //เก็บไว้เทสนะอิอิ    dd($data->toArray());
        $listyear =  Year::orderBy('start','DESC')->get();
       return view('page2.saveresultoffer.saveresult.addsaveresult',compact('listyear','data'));
    }

     // end formoffer

     // formtactics
     public function formaddtactics(Request $request){
        $listyear =  Year::orderBy('start','DESC')->get();
        return view('page2.tactics.button.addtactics',compact('listyear'));
    }
    public function formedittactics(Request $request){
       $data= Tactics::where('tactics.id',$request->id)->first();
    //    dd($data->toArray());
       //เก็บไว้เทสนะอิอิ    dd($data->toArray());
       $listyear =  Year::orderBy('start','DESC')->get();
       $liststrategic =  Strategic::where('year_id',$data['year_id'])->orderBy('name','DESC')->get();
       return view('page2.tactics.button.edittactics',compact('listyear','data','liststrategic'));
    }
    // end formtactics

    public function formshowapproveoffer(Request $request){
        $data= Offer::where('id',$request->id)->select('*','year as d_year')->get()->load('objective','procedure','time','useful','user','detail_budget','year.strategic.tactic')->first()->toArray();
       if(count($data['objective'])>0){
        $data['objective']  =collect($data['objective'])->map(function($item){
                return $item['name'];
            })->toArray();

      }

      if(count($data['procedure'])>0){
        $data['procedure']  =collect($data['procedure'])->map(function($item){
                return $item['name'];
            })->toArray();

      }
      if(count($data['useful'])>0){
        $data['useful']  =collect($data['useful'])->map(function($item){
                return $item['name'];
            })->toArray();

      }
      if(count($data['time'])>0){
        $data['time']  =collect($data['time'])->map(function($item){
                return [
                    "name" => $item['activity'],
                    "start" => $item['start'],
                    "end" => $item['stop']
                ];
            })->toArray();

      }
      if(count($data['detail_budget'])>0){
        $data['detail_budget']  =collect($data['detail_budget'])->map(function($item){
                return [
                    "detail" => $item['detail'],
                    "price" => $item['amount'],
                ];
            })->toArray();

      }
        $listyear =  Year::orderBy('start','DESC')->get();
       return view('page2.approveoffer.approve.show',compact('listyear','data'));

}

}
