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
                    'username'=>"name$i",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'admin'
                ];
            }else if($i<=15){
                $user=[
                    'username'=>"name$i",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'executive'
                ];
            }else if($i<=30) {
                $user=[
                    'username'=>"name$i",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'staff'
                ];
            }else {
                $user=[
                    'username'=>"name$i",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'personnel'
                ];
            }
            $personnel=[
                'title'=>'โรงเรียน',
                'name'=>'เทศบาล1 บ้านสิงหนคร'	,
                'address'=>'45ซ.เทศบาลสิงหนคร.เขาแดง'	,
                'telnum'=>'0891234881',
                'responsible'=>'แจ่ม เอมอน',

            ];
            if($user['rolse'] == 'personnel'){
                User::create($user)->personnel()->create($personnel);
            }
            else{
                User::create($user)->personnel()->create($personnel);
            }

        }


    }
}
