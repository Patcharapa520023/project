<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Manage_Tactics extends Controller
{
    public function addtacticsl(Request $request){
        $input =  $request->all();
        $this->validator($input)->validate();
        $user=[
            'username'=>$input['username'],
            'password'=>Hash::make($input['password']),
            'rolse'=>'tacticsl',
        ];
        $tacticsl=[
            'id_tatics'=>$input['id_tatics'],
            'year'=>$input['year'],
            'strtegic_name'=>$input['strtegic_name'],
            'tactics_name'=>$input['tactics_name'],
        

        ];
        User::create($user)->tactics()->create($tacticsl);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลกลยุทธ์ สำเร็จแล้ว');

    }
    public function deletetactics(Request $request){
        User::find($request->all()['id'])->delete();
        return back();
    }

    protected function validator(array $data,$tf=false)
    {
        $vali = [

            "id_tatics" => ['required', 'string', 'max:255'],
            "year" => ['required', 'string', 'max:255'],
            "strtegic_name" => ['required', 'string', 'max:255'],
            "tactics_name" =>['required', 'string', 'max:255'],
        
        ];
        if($tf&&$tf==$data['username']){
        $vali["username"] = ['required', 'string','max:20'];
        }else {
        $vali["username"] = ['required', 'string','max:20', 'unique:users'];

        }
        return Validator::make($data,$vali);
    }
    public function edit(Request $request){
        $input =  $request->all();
        $dbuser =  User::find($input['id']);
        $this->validator($input,$dbuser->username)->validate();
        $user=[
            'username'=>$input['username'],
            'rolse'=>$input['rolse'],
        ];
        $tacticsl=[
            'id_tatics'=>$input['id_tatics'],
            'year'=>$input['year'],
            'strtegic_name'=>$input['strtegic_name'],
            'tactics_name'=>$input['tactics_name'],
        


        ];
        $edit = User::find($input['id']);
        $edit ->update($user);
        $edit->tacticsl()->update($tactics);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลกลยุทธ์ สำเร็จแล้ว');


    }
    public function editpasswordtacticsl(Request $request){
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
