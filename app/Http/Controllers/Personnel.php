<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class Personnel extends Controller
{
    public function addpersonnel(Request $request){
        dd($this->validator($request->all())->validate());
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

