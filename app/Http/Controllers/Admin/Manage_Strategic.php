<?php

namespace App\Http\Controllers\Admin;
use App\Models\Strategic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Manage_Strategic extends Controller
{
    public function addstrategic(Request $request){
        $input =  $request->all();
        $this->validator($input)->validate();

        $strategic=[
            'title'=>$input['title'],
            'name'=>$input['name'],
            'year'=>$input['year'],


        ];

        Strategic::create($strategic);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลยุทธศาสตร์ สำเร็จแล้ว');

    }
    public function deletestrategic(Request $request){
        Strategic::find($request->all()['id'])->delete();
        return back();
    }

    protected function validator(array $data,$tf=false)
    {
        $vali = [

            "title" => ['required', 'string', 'max:255'],
            "name" => ['required', 'string', 'max:255'],
            "year" => ['required', 'string', 'max:255'],


        ];
        if($tf&&$tf==$data['username']){
         $vali["username"] = ['required', 'string','max:20'];
        }else {
         $vali["username"] = ['required', 'string','max:20', 'unique:users'];

        }
        return Validator::make($data,$vali);
    }
    public function editstrategic(Request $request){
        $input =  $request->all();
        $dbuser =  Strategic::find($input['id']);
        $this->validator($input,$dbuser->username)->validate();

        $strategic=[
            'title'=>$input['title'],
            'name'=>$input['name'],
            'year'=>$input['year'],



        ];
        $edit = Strategic::find($input['id']);
        $edit ->update($strategic);
        $edit->strategic()->update($strategic);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลผู้บริหาร สำเร็จแล้ว');


    }


}
