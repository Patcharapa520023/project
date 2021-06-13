<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Personnel;
class Personneltb extends Controller
{
    public function show(){
        $tables = Personnel::with('user')->get()->toArray();
        $headtables  = array(
            array("ไอดี","id"),
            array("บทบาท","rolse"),
            array("อีเมล์","email"),
            array("รหัสผ่าน","password"),
            array("คำนำหน้า","title"),
            array("ชื่อ","name"),
            array("นามสกุล","lastname"),
            array("ที่อยู่","address"),
            array("เบอร์โทรศัพท์","telnum"),
        );

        return view('page2.table_Personnel',compact('headtables'));
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


        $totalRecords = Personnel::with('user')->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Personnel::with('user')->select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

          $records =Personnel::with('user')->orderBy($columnName,$columnSortOrder)
          ->where('name', 'like', '%'.$searchValue .'%')
          ->select('*')
          ->skip($start)
          ->take($rowperpage)
          ->get();
        $data_arr = array();
        foreach($records as $record){
                $id = $record->id;
                $name = $record->name;
                $rolse = $record->user->rolse;
                $email = $record->user->email;
                $password = $record->user->password;
                $title = $record->title;
                $lastname = $record->lastname;
                $address = $record->address;
                $telnum = $record->telnum;
            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "rolse" => $rolse,
                "email" => $email,
                "password" => $password,
                "title" => $title,
                "lastname" => $lastname,
                "address" => $address,
                "telnum" => $telnum,
                "console" => "",

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
