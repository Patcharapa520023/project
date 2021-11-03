<?php

namespace App\Http\Controllers\Admin\Datatable;

use App\Models\Strategic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tactics;

class Tacticstb extends Controller
{
    public function show(){
        $headtables  = array(
            array("ลำดับ","id"),
            array("ชื่อกลยุทธ์","name"),
            array("สอดคล้องยุทธศาสตร์","st_name"),
            array("ปีงบประมาณ","year"),
        );
        // dd($headtables);


        return view('page2.tactics.Table.table_Tactics',compact('headtables'));
    }
    public function getdata(Request $request){
        $eloq = Tactics::leftJoin('years','years.id','=','tactics.year_id')
        ->leftJoin('strategics','strategics.id','=','tactics.strategic_id')
        ->where('strategics.category',($request->type)?$request->type:1)
        ->select('strategics.name as st_name','years.stop','years.start','years.atplan','tactics.name','tactics.id')
        ;
        return datatables()
        ->eloquent($eloq)
        ->addColumn('console', function ($data) {
            $name = $data->name;
            return $this->columcontro($data->id,$name,'tactics',false);
        })
        ->addColumn('year', function ($data) {
            return   $data->start.'-'.$data->stop.' ('.$data->atplan.' ปี)';
        })
        ->toJson();
      }

}
