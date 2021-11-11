<?php

namespace App\Http\Controllers\Admin\Datatable;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Offertb extends Controller
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


        return view('page2.offer.table.table_Offer',compact('headtables'));
    }
    public function getdata(Request $request){
        $id = auth()->user()->id;
        if($request->type==1){
            $eloq = Offer::select('*')->where('user_id',$id);
        }
        else{
            $eloq = Offer::select('*');
        }
        return datatables()
        ->eloquent($eloq)
        ->with([
            'offer_all'=>Offer::select('*')->count(),
            'offer_my'=>Offer::select('*')->where('user_id',$id)->count(),
        ])
        ->addColumn('console', function ($data) {
            $name = $data->name;
            return $this->columcontro($data->id,$name,'offer',true);
        })
        ->toJson();
    }

}
