<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Manage_Year extends Controller
{
    public function addyear(Request $request){
        $input =  $request->all();
        $this->validator($input)->validate();
        $user=[
            'username'=>$input['username'],
            'password'=>Hash::make($input['password']),
            'rolse'=>'year',
        ];
        $year=[
            'title'=>$input['title'],
            'name'=>$input['name'],
            'lastname'=>$input['lastname'],
            'address'=>$input['address'],
            'telnum'=>$input['phone'],


        ];
        User::create($user)->year()->create($year);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลเจ้าหน้าที่กองการศึกษา สำเร็จแล้ว');

    }
    public function deleteyear(Request $request){
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
    public function edityear(Request $request){
        $input =  $request->all();
        $dbuser =  User::find($input['id']);
        $this->validator($input,$dbuser->username)->validate();
        $user=[
            'username'=>$input['username'],
            'rolse'=>$input['rolse'],
        ];
        $year=[
            'title'=>$input['title'],
            'atplan'=>$input['atpan'],
            'start'=>$input['start'],
            'stop'=>$input['stop'],
            'time'=>$input['time'],


        ];
        $edit = User::find($input['id']);
        $edit ->update($user);
        $edit->year()->update($year);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลแผนพัฒนาการศึกษา สำเร็จแล้ว');


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
