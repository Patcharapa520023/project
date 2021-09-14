<?php

namespace App\Http\Controllers\Admin\Datatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Strategic;
class Strategictb extends Controller
{
    public function show(){
        $tables = Strategic::with('year')->get()->toArray();
        $headtables  = array(
            array("ลำดับ","id"),
            // array("บทบาท","rolse"),
            array("ชื่อยุทธศาสตร์","name"),
            // array("รหัสผ่าน","password"),
            array("ปีงบประมาณ","year"),
        );
        // dd($headtables);


        return view('page2.strategic.table.table_strategic',compact('headtables'));
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


        $totalRecords = Strategic::with('year')->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Strategic::with('year')->select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

          $records =Strategic::with('year')->orderBy($columnName,$columnSortOrder)
          ->where('name', 'like', '%'.$searchValue .'%')
          ->select('*')
          ->skip($start)
          ->take($rowperpage)
          ->get();
        $data_arr = array();
        foreach($records as $key=> $record){
                $formurl = route('delete_strategic_post');
                $id = $record->id;
                $csrf = csrf_field();
                $name = $record->name;
                $rolse = $record->year->rolse;
                $year = $record->year;
                $console = "<div class='table-data-feature'>
                <a  href='show/$id/strategic'>
                <button class='item show' data-toggle='tooltip' data-placement='top' title=' data-original-title='More'>
                    <i class='fa fa-search-plus'></i>
                </button>
                </a>
                <a  href='edit/$id/strategice'>
                <button class='item edit' data-toggle='tooltip' data-placement='top' title=' data-original-title='Edit'>
                    <i class='fa fa-edit'></i>
                </button>
                </a>
                <form method='POST' action='$formurl' onSubmit='dbdelete(this,`$name$year`)'>
                    $csrf
                    <input type='hidden' name='id' value='$id'>
                    <input type='hidden' name='id2' value='4'>
                <button class='item delete' data-toggle='tooltip' data-placement='top' title=' data-original-title='Delete'>
                    <i class='fa fa-trash-o'></i>
                </button>
                </form>
                </div>";

            $data_arr[] = array(
                "id" => $key+1,
                "name" => $name,
                // "rolse" => $rolse,
                "year" => $year->start.'-'.$year->stop.' ('.$year->atplan.' ปี)',
                "console" => $console,
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
