<?php

namespace App\Http\Controllers\Admin\Datatable;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Reporttb extends Controller
{
    public function show(){
        $headtables  = array(
            array("ลำดับ","id","id"),
            // array("บทบาท","rolse"),
            array("ชื่อโครงการ","name","id"),
            array("ยุทธศาสตร์","strategic_t_id","id"),
            array("กลยุทย์","tactic_t_id","id"),
            // array("รหัสผ่าน","password"),
            array("ปีงบประมาณ","year","id"),
        );
        // dd($headtables);


        return view('page2.report.table.table_report',compact('headtables'));
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
            return $this->columcontroo($data->id,$name,'offer',true);
        })
        ->toJson();
    }

}