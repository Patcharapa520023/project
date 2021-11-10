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
        if($type==1)  $eloq = Offer::select('*')->where('approve','=',1)->where('user_id',$id);
        else  $eloq = Offer::select('*')->where('approve','=',1)->where('user_id',$id);
        return datatables()
        ->eloquent($eloq)
        ->addColumn('console', function ($data) {
            $name = $data->name;
            return $this->saveresult($data->id,$name,'offer');

        })
        ->toJson();
    }
}
