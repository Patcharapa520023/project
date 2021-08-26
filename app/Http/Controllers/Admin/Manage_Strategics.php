<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Manage_Strategics extends Controller
{
    public function addstrategics(Request $request){
        $input =  $request->all();
        $this->validator($input)->validate();
        $user=[
            'username'=>$input['username'],
            'password'=>Hash::make($input['password']),
            'rolse'=>'strtegic',
        ];
        $strategics=[
            'id_strategic'=>$input['id_strategic'],
            'year'=>$input['year'],
            'strtegic_name'=>$input['strtegic_name'],
    
        ];
        User::create($user)->strategic()->create($strategics);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลยุทธศาสตร์ สำเร็จแล้ว');

    }
    public function deletestrategics(Request $request){
        User::find($request->all()['id'])->delete();
        return back();
    }

    protected function validator(array $data,$tf=false)
    {
        $vali = [

            "id_strategic" => ['required', 'string', 'max:255'],
            "year" => ['required', 'string', 'max:255'],
            "strtegic_name" => ['required', 'string', 'max:255'],
        

        ];
        if($tf&&$tf==$data['username']){
        $vali["username"] = ['required', 'string','max:20'];
        }else {
        $vali["username"] = ['required', 'string','max:20', 'unique:users'];

        }
        return Validator::make($data,$vali);
    }
    public function editstrategics(Request $request){
        $input =  $request->all();
        $dbuser =  User::find($input['id']);
        $this->validator($input,$dbuser->username)->validate();
        $user=[
            'username'=>$input['username'],
            'rolse'=>$input['rolse'],
        ];
        $strategics=[
            'id_strategic'=>$input['title'],
            'year'=>$input['name'],
            'strtegic_name'=>$input['lastname'],


        ];
        $edit = User::find($input['id']);
        $edit ->update($user);
        $edit->strategics()->update($strtegic);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลpยุทธศาสตร์ สำเร็จแล้ว');


    }
    public function editpasswordstrategics(Request $request){
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
