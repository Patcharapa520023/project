<?php

namespace App\Http\Controllers\Admin\Datatable;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Approve_offertb extends Controller
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


        return view('page2.approveoffer.table.Table_Approveoffer',compact('headtables'));
    }
    public function getdata(Request $request){
        $eloq = Offer::where('approve',$request->type);
        return datatables()
        ->eloquent($eloq)
        ->with([
            'count_approve'=>Offer::where('approve',1)->count(),
            'count_reject'=>Offer::where('approve',2)->count(),
            'count_await'=>Offer::where('approve',0)->count(),
        ])
        ->addColumn('console', function ($data) {
            $name = $data->name;
            return $this->approve($data->id,$name,'offer',true);
        })
        ->editColumn('name',function($record){
            return
            '<div class="flex ml-3" style="
            cursor: pointer;
        ">
            <div>'. $record->name.'</div>
            <a href="/show/'.$record->id.'/approveoffer">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="
            width: 24px;
            color: #6173f5;
        "><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" style="
            width: 59px;
        "></path></svg>
            (ดูรายละเอียด)
            </a>
            </div>'
        ;
        })
        ->rawColumns(['name'],true)
        ->toJson();
    }


}
