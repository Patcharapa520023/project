<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Year;
use Illuminate\Support\Facades\Hash;

class Manage_Strategic extends Controller
{
    public function addstrategic(Request $request){
        $input =  $request->all();
        $this->validator($input)->validate();
        $user=[
            'username'=>$input['username'],
            'password'=>Hash::make($input['password']),
            'rolse'=>'strategic',
        ];
        $strategic=[
            'id'=>$input['id'],
            'name'=>$input['name'],
            'year'=>$input['year'],


        ];
        User::create($user)->strategic()->create($strategic);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลยุทธศาสตร์ สำเร็จแล้ว');

    }
    public function deletestrategic(Request $request){
        User::find($request->all()['id'])->delete();
        return back();
    }

    protected function validator(array $data,$tf=false)
    {
        $vali = [

            "id" => ['required', 'string', 'max:255'],
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
        $dbuser =  Year::find($input['id']);
        $this->validator($input,$dbuser->username)->validate();
        $user=[
            'username'=>$input['username'],
            'rolse'=>$input['rolse'],
        ];
        $strategic=[
            'id'=>$input['id'],
            'name'=>$input['name'],
            'year'=>$input['year'],



        ];
        $edit = User::find($input['id']);
        $edit ->update($user);
        $edit->strategic()->update($strategic);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลผู้บริหาร สำเร็จแล้ว');


    }
    public function editpasswordstrategic(Request $request){
        $input =  $request->all();
        // $this->validator($input)->validate();
        Validator::make($input, [

            'password' => 'required|confirmed|min:6',
        ])->validate();
        $user=[
            'password'=>Hash::make($input['password']),
        ];


        $edit = User::find($input['id']);
        $edit ->update($user);
        return redirect()->back()->with('error', 'แก้ไขรหัสผ่านใหม่ สำเร็จแล้ว');
    }

}
