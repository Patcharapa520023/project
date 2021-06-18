<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Executive;

class Createuser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Department::create([
            'name'=>"กองการศึกษา",
            'address'=>'เทศบาลสิงหนคร',
            'phone'=>'073274707',
            'fax'=>'458788599'
        ]);
        for ($i=1; $i <50 ; $i++) {
            if($i == 1){
                $user=[
                    'email'=>"ft@gmaidl$i.com",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'admin'
                ];
            }else if($i<=15){
                $user=[
                    'email'=>"ft@gmaidl$i.com",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'executive'
                ];
            }else if($i<=30) {
                $user=[
                    'email'=>"ft@gmaidl$i.com",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'staff'
                ];
            }else {
                $user=[
                    'email'=>"ft@gmaidl$i.com",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'personnel'
                ];
            }
            $personnel=[
                'title'=>'นางสาว',
                'name'=>'เอมอร'	,
                'lastname'=>'แจ่ม'	,
                'address'=>'45ซ.ยินดีเจริญจ.ขอนแก่น'	,
                'telnum'=>'0891234881',
                'position'=>'เจ้าหน้าที่',
                'department_id'=>'1'
            ];
            if($user['rolse'] == 'executive'){
                User::create($user)->executive()->create($personnel);
            }else if($user['rolse'] == 'staff'){
                User::create($user)->staff()->create($personnel);
            }
            else{
                User::create($user)->personnel()->create($personnel);
            }

        }


    }
}
