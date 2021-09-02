<?php

namespace App\Http\Controllers\Admin\Datatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Year;
class Yeartb extends Controller
{
    public function show(){
        $tables =  Year::with('user')->get()->toArray();
        $headtables  = array(
            array("ลำดับ","id"),
            // array("บทบาท","rolse"),
            array("แผนพัฒนาการศึกษา(ปี)","atplan"),
            // array("รหัสผ่าน","password"),
            array("ปีที่เริ่ม","start"),
            array("ปีที่สิ้นสุด","stop"),

        
        );
        // dd($headtables);


        return view('page2.year.table.table_year',compact('headtables'));
    }
    public function getdata(Request $request){

        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value


        $totalRecords =  Year::with('user')->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Year::with('user')->select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

            $records = Year::with('user')->orderBy($columnName,$columnSortOrder)
            ->where('name', 'like', '%'.$searchValue .'%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
        ->get();
        $data_arr = array();
        foreach($records as $key=> $record){
                $formurl = route('delete_year_post');
                $id = $record->user->id;
                $idbase = base64_encode($record->user->id);
                $csrf = csrf_field();
                $atplan = $record->atplan;
                $rolse = $record->user->rolse;
                $start = $record->user->start;
                $password = $record->user->password;
                $title = $record->title;
                $stop = $record->stop;
                $console = "<div class='table-data-feature'>
                <a  href='show/$idbase/year'>
                <button class='item show' data-toggle='tooltip' data-placement='top' title=' data-original-title='More'>
                    <i class='fa fa-search-plus'></i>
                </button>
                </a>
                <a  href='edit/$idbase/year'>
                <button class='item edit' data-toggle='tooltip' data-placement='top' title=' data-original-title='Edit'>
                    <i class='fa fa-edit'></i>
                </button>
                </a>
                <form method='POST' action='$formurl' onSubmit='dbdelete(this,`$title$atyear $start$stop`)'>
                    $csrf
                    <input type='hidden' name='id' value='$id'>
                    <input type='hidden' name='id2' value='4'>
                <button class='item delete' data-toggle='tooltip' data-placement='top' title=' data-original-title='Delete'>
                    <i class='fa fa-trash-o'></i>
                </button>
                </form>
                </div>";

            $data_arr[] = array(
                "id" => $key+1+$start,
                "title" => $title,
                "atplan" => $title.$atplan,
                // "rolse" => $rolse,
                "start" => $start."".$stop,
                // "password" => '$password',
            
                // "lastname" => $lastname,
                "stop" => $stop,
            

            );
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }


}
