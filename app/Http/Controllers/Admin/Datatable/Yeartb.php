<?php

namespace App\Http\Controllers\Admin\Datatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Year;



class Yeartb extends Controller
{
    public function show(){
<<<<<<< HEAD
        $tables =  Year::get()->toArray();
=======
        $tables =  Year::with('year')->get()->toArray();
>>>>>>> 6e5e833331c19872255e424179af7b5f56d9e6f5
        $headtables  = array(
            array("ลำดับ","title"),
            // array("บทบาท","rolse"),
            array("แผนพัฒนาการศึกษา(ปี)","atplan"),
            // array("รหัสผ่าน","password"),
            array("ปีที่เริ่ม","start"),
<<<<<<< HEAD
            array("ปีที่สิ้นสุด","stop"),

=======
            array("ปีที่เริ่ม","stop"),
        

        
>>>>>>> 6e5e833331c19872255e424179af7b5f56d9e6f5
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


<<<<<<< HEAD
        $totalRecords =  Year::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Year::select('count(*) as allcount')->where('start', 'like', '%' .$searchValue . '%')->count();
=======
        $totalRecords =  Year::with('year')->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Year::with('year')->select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
>>>>>>> 6e5e833331c19872255e424179af7b5f56d9e6f5

            $records = Year::orderBy($columnName,$columnSortOrder)
            ->where('start', 'like', '%'.$searchValue .'%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
        ->get();
        $data_arr = array();
        foreach($records as $key=> $record){
                $formurl = route('delete_year_post');
                $id = $record->year->id;
                $idbase = base64_encode($record->user->id);
                $csrf = csrf_field();
                $atplan = $record->atplan;
<<<<<<< HEAD
                $start = $record->user->start;
                $title = $record->title;
=======
                $rolse = $record->year->rolse;
                $start = $record->year->start;
                $password = $record->year->password;
                $id = $record->id;
>>>>>>> 6e5e833331c19872255e424179af7b5f56d9e6f5
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
<<<<<<< HEAD
                <form method='POST' action='$formurl' onSubmit='dbdelete(this,`$title `)'>
=======
                <form method='POST' action='$formurl' onSubmit='dbdelete(this,`$title$atplan`)'>
>>>>>>> 6e5e833331c19872255e424179af7b5f56d9e6f5
                    $csrf
                    <input type='hidden' name='id' value='$id'>
                    <input type='hidden' name='id2' value='4'>
                <button class='item delete' data-toggle='tooltip' data-placement='top' title=' data-original-title='Delete'>
                    <i class='fa fa-trash-o'></i>
                </button>
                </form>
                </div>";

            $data_arr[] = array(
                "title" => $key+1+$start,
                "atplan" => $atplan,
                // "rolse" => $rolse,
                "start" => $start."".$stop,
                // "password" => '$password',
            
                // "lastname" => $lastname,
                "stop" => $stop,
<<<<<<< HEAD
                "console" => $console,
=======
            
>>>>>>> 6e5e833331c19872255e424179af7b5f56d9e6f5

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
