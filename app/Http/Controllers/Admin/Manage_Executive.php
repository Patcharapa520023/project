<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Manage_Executive extends Controller
{
    public function addexecutive(Request $request){
        $input =  $request->all();
        $this->validator($input)->validate();
        $user=[
            'username'=>$input['username'],
            'password'=>Hash::make($input['password']),
            'rolse'=>'executive',
        ];
        $executive=[
            'title'=>$input['title'],
            'name'=>$input['name'],
            'lastname'=>$input['lastname'],
            'address'=>$input['address'],
            'telnum'=>$input['phone'],


        ];
        User::create($user)->executive()->create($executive);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลผู้บริหาร สำเร็จแล้ว');

    }
    public function deleteexecutive(Request $request){
        User::find($request->all()['id'])->delete();
        return back();
    }

    protected function validator(array $data,$tf=false)
    {
        $vali = [

            "title" => ['required', 'string', 'max:255'],
            "name" => ['required', 'string', 'max:255'],
            "lastname" => ['required', 'string', 'max:255'],
            "phone" =>['required', 'string', 'max:255'],
            "rolse" => ['required', 'string', 'max:255'],
            "address" => ['required', 'string', 'max:255'],

        ];
        if($tf&&$tf==$data['username']){
         $vali["username"] = ['required', 'string','max:20'];
        }else {
         $vali["username"] = ['required', 'string','max:20', 'unique:users'];

        }
        return Validator::make($data,$vali);
    }
    public function editexecutive(Request $request){
        $input =  $request->all();
        $dbuser =  User::find($input['id']);
        $this->validator($input,$dbuser->username)->validate();
        $user=[
            'username'=>$input['username'],
            'rolse'=>$input['rolse'],
        ];
        $executive=[
            'title'=>$input['title'],
            'name'=>$input['name'],
            'lastname'=>$input['lastname'],
            'address'=>$input['address'],
            'telnum'=>$input['phone'],


        ];
        $edit = User::find($input['id']);
        $edit ->update($user);
        $edit->executive()->update($executive);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลผู้บริหาร สำเร็จแล้ว');


    }
    public function editpasswordexecutive(Request $request){
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
