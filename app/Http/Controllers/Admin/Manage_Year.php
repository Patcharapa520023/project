<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Year;
use Illuminate\Support\Facades\Hash;

class Manage_Year extends Controller
{
    public function addyear(Request $request){
        $input =  $request->all();


        $year=[
            'atplan'=>$input['atplan'],
            'start'=>$input['start'],
            'stop'=>$input['start']+$input['atplan']-1,



        ];
        Year::create($year);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลแผนพัฒนาการศึกษา สำเร็จแล้ว');

    }
    public function deleteyear(Request $request){
        Year::find($request->all()['id'])->delete();
        return back();
    }

    protected function validator(array $data,$tf=false)
    {
        $vali = [

            "id" => ['required', 'string', 'max:255'],
            "atplan" => ['required', 'string', 'max:255'],
            "start" => ['required', 'string', 'max:255'],
            "stop" =>['required', 'string', 'max:255'],
            "rolse" => ['required', 'string', 'max:255'],


        ];
        /*if($tf&&$tf==$data['username']){
        $vali["username"] = ['required', 'string','max:20'];
        }else {
        $vali["username"] = ['required', 'string','max:20', 'unique:users'];

        }*/
        return Validator::make($data,$vali);
    }
    public function edityear(Request $request){
        $input =  $request->all();
        $dbuser =  Year::find($input['id']);
        $year=[
            'atplan'=>$input['atplan'],
            'start'=>$input['start'],
            'stop'=>$input['start']+$input['atplan']-1,


        ];
        $edit = Year::find($input['id']);
        $edit->update($year);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลแผนพัฒนาการศึกษา สำเร็จแล้ว');
    }
}
