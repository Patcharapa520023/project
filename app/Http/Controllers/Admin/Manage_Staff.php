<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Manage_Staff extends Controller
{
    public function addstaff(Request $request){
        $input =  $request->all();
        $this->validator($input)->validate();
        $user=[
            'username'=>$input['username'],
            'password'=>Hash::make($input['password']),
            'rolse'=>$input['rolse'],
        ];
        $staff=[
            'title'=>$input['title'],
            'name'=>$input['name'],
            'lastname'=>$input['lastname'],
            'address'=>$input['address'],
            'telnum'=>$input['phone'],


        ];
        User::create($user)->staff()->create($staff);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลบุคลากรสถานศึกษา สำเร็จแล้ว');

    }
    public function deletestaff(Request $request){
        User::find($request->all()['id'])->delete();
        return back();
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            "username" => ['required', 'string','max:20', 'unique:users'],
            "title" => ['required', 'string', 'max:255'],
            "name" => ['required', 'string', 'max:255'],
            "lastname" => ['required', 'string', 'max:255'],
            "phone" =>['required', 'string', 'max:255'],
            "rolse" => ['required', 'string', 'max:255'],
            "address" => ['required', 'string', 'max:255'],

        ]
    );
    }
    public function editstaff(Request $request){
        $input =  $request->all();
        $dbuser =  User::find($input['id']);

        $this->validator($input)->validate();
        $user=[
            'username'=>$input['username'],
            'rolse'=>$input['rolse'],
        ];
        $staff=[
            'title'=>$input['title'],
            'name'=>$input['name'],
            'lastname'=>$input['lastname'],
            'address'=>$input['address'],
            'telnum'=>$input['phone'],


        ];
        $edit = User::find($input['id']);
        $edit ->update($user);
        $edit->staff()->update($staff);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลบุคลากรสถานศึกษา สำเร็จแล้ว');


    }
    public function editpasswordstaff(Request $request){
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
        return redirect()->back()->with('error', 'แก้ไขรหัสผ่าน สำเร็จแล้ว');
    }
}
