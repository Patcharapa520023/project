<?php

namespace App\Http\Controllers\Admin\Datatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
class Stafftb extends Controller
{
    public function show(){
        $tables = Staff::with('user')->get()->toArray();
        $headtables  = array(
            array("ลำดับ","id","users.id"),
            // array("บทบาท","rolse"),
            array("ชื่อผู้ใช้","username","users.username"),
            // array("รหัสผ่าน","password"),
            array("ชื่อ สกุล","name","staff.name"),
            array("ที่อยู่","address","staff.address"),
            array("เบอร์โทรศัพท์","telnum","staff.telnum"),
        );
        // dd($headtables);


        return view('page2.staff.table.table_staff',compact('headtables'));
    }
    public function getdata(Request $request){
        $eloq = User::rightJoin('staff','staff.user_id','=','users.id');
        return datatables()
        ->eloquent($eloq)
        ->addColumn('console', function ($user) {
            $name = $user->name.$user->title.$user->lastname;
            return $this->columcontro($user->user_id,$name,'staff');
        })
        ->toJson();
      }
    public function getdatap(Request $request){

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


        $totalRecords = Staff::with('user')->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Staff::with('user')->select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

          $records =Staff::with('user')->orderBy($columnName,$columnSortOrder)
          ->where('name', 'like', '%'.$searchValue .'%')
          ->select('*')
          ->skip($start)
          ->take($rowperpage)
          ->get();
        $data_arr = array();
        foreach($records as $key=> $record){
                $formurl = route('delete_staff_post');
                $id = $record->user->id;
                $idbase = $record->user->id;
                $csrf = csrf_field();
                $name = $record->name;
                $rolse = $record->user->rolse;
                $username = $record->user->username;
                $password = $record->user->password;
                $title = $record->title;
                $lastname = $record->lastname;
                $address = $record->address;
                $telnum = $record->telnum;
                $console = "<div class='table-data-feature'>
                <a  href='show/$idbase/staff'>
                <button class='item show' data-toggle='tooltip' data-placement='top' title=' data-original-title='More'>
                    <i class='fa fa-search-plus'></i>
                </button>
                </a>
                <a  href='edit/$idbase/staff'>
                <button class='item edit' data-toggle='tooltip' data-placement='top' title=' data-original-title='Edit'>
                    <i class='fa fa-edit'></i>
                </button>
                </a>
                <form method='POST' action='$formurl' onSubmit='dbdelete(this,`$title$name $lastname`)'>
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
                "name" => $title.$name." ".$lastname,
                // "rolse" => $rolse,
                "username" => $username,
                // "password" => '$password',
                // "title" => $title,
                // "lastname" => $lastname,
                "address" => $address,
                "telnum" => $telnum,
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
