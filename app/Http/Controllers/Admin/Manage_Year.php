<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Manage_Year extends Controller
{
    public function addYear(Request $request){
        $input =  $request->all();
        $this->validator($input)->validate();
        $user=[
            'username'=>$input['username'],
            'password'=>Hash::make($input['password']),
            'rolse'=>'Year',
        ];
        $Year=[
        
            'year'=>$input['year'],


        ];
        User::create($user)->year()->create($Year);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลปี สำเร็จแล้ว');

    }
    public function deleteYear(Request $request){
        User::find($request->all()['id'])->delete();
        return back();
    }

    protected function validator(array $data,$tf=false)
    {
        $vali = [

            "ัyear" => ['required', 'string', 'max:255'],
    

        ];
        if($tf&&$tf==$data['username']){
        $vali["username"] = ['required', 'string','max:20'];
        }else {
        $vali["username"] = ['required', 'string','max:20', 'unique:users'];

        }
        return Validator::make($data,$vali);
    }
    public function edityear(Request $request){
        $input =  $request->all();
        $dbuser =  User::find($input['id']);
        $this->validator($input,$dbuser->username)->validate();
        $user=[
            'username'=>$input['username'],
            'rolse'=>$input['rolse'],
        ];
        $Year=[
            'year'=>$input['year'],
        

        ];
        $edit = User::find($input['id']);
        $edit ->update($user);
        $edit->year()->update($year);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลปีงบประมาณ สำเร็จแล้ว');


    }
    public function editpasswordyear(Request $request){
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
