<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class Personnel extends Controller
{
    public function addpersonnel(Request $request){
        $input =  $request->all();
        $this->validator($input)->validate();
        $user=[
            'email'=>$input['email'],
            'password'=>Hash::make($input['password']),
            'rolse'=>$input['rolse'],
        ];
        $personnel=[
            'title'=>$input['title'],
            'name'=>$input['name'],
            'lastname'=>$input['lastname'],
            'address'=>$input['address'],
            'telnum'=>$input['phone'],
            'position'=>$input['position'],
            'department_id'=>'1'
        ];
        User::create($user)->personnel()->create($personnel);
        return redirect()->back()->with('error', 'เพิ่มข้อมูลบุคลากรสถานศึกษา สำเร็จแล้ว');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "password" => ['required', 'string', 'min:8'],
            "title" => ['required', 'string', 'max:255'],
            "name" => ['required', 'string', 'max:255'],
            "lastname" => ['required', 'string', 'max:255'],
            "phone" =>['required', 'string', 'max:255'],
            "rolse" => ['required', 'string', 'max:255'],
            "position" => ['required', 'string', 'max:255'],
            "address" => ['required', 'string', 'max:255'],
            "city" => ['required', 'string', 'max:255'],
            "postal_code" => ['required', 'string', 'max:255'],
            "country" => ['required', 'string', 'max:255'],
        ]
    );
    }

}

