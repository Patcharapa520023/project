<?php

namespace App\Http\Controllers\Admin\Datatable;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Saveresulttb extends Controller
{
    public function show(){
        $headtables  = array(
            array("ลำดับ","id","id"),
            // array("บทบาท","rolse"),
            array("ชื่อโครงการ","name","id"),
            // array("รหัสผ่าน","password"),
            array("ปีงบประมาณ","year","id"),
        );
        // dd($headtables);


        return view('page2.saveresultoffer.table.table_saveresult',compact('headtables'));
    }
    public function getdata(Request $request){
        $type = $request->type;
        $id = auth()->user()->id;
        $approve_all = Offer::select('*')->where('approve','=',1)->where('status_result',1)->count();
        $await_all = Offer::select('*')->where('approve','=',1)->where('status_result',0)->count();
        if($type==1)  $eloq = Offer::select('*')->where('approve','=',1)->where('status_result',$request->type);
        else  $eloq = Offer::select('*')->where('approve','=',1)->where('status_result',0);
        return datatables()
        ->eloquent($eloq)
        ->with([
                'approve_all'=>$approve_all,
                'await_all'=>$await_all,
        ] )
        ->addColumn('console', function ($data) use($type){
            $name = $data->name;
            return $this->saveresult($data->id,$type );

        })
        ->toJson();
    }
}

