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
        for ($i=1; $i < 10 ; $i++) {
            if($i == 1){
                $user=[
                    'username'=>"name$i",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'admin'
                ];
                User::create($user);
            }else if($i<=5){
                $user=[
                    'username'=>"name$i",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'executive'
                ];
                $executive = [
                    'title'=>'นาย',
                    'name'=>'ดำแดงเขียว',
                    'lastname'=>'ดำแดงเขียว',
                    'address'=>'104 92000 บ.144 5.13123 .........',
                    'telnum'=>'0632456224',

                ];
                User::create($user)->executive()->create($executive);
            }
            else  {
                $user=[
                    'username'=>"name$i",
                    'password'=>Hash::make('1234'),
                    'rolse'=>'staff'
                ];
                $staff = [
                    'title'=>'นาย',
                    'name'=>'ดำแดงเขียว',
                    'lastname'=>'ดำแดงเขียว',
                    'address'=>'104 92000 บ.144 5.13123 .........',
                    'telnum'=>'0632456224',

                ];
                User::create($user)->staff()->create($staff);
            }

        }

        $user=[
            'username'=>"name1231421",
            'password'=>Hash::make('1234'),
            'rolse'=>'personnel'
        ];
        $personnel=[
            'title'=>'โรงเรียน',
            'name'=>'เทศบาล1 บ้านสิงหนคร'	,
            'address'=>'45ซ.เทศบาลสิงหนคร.เขาแดง'	,
            'telnum'=>'0891234881',
            'responsible'=>'แจ่ม เอมอน',
        ];
        User::create($user)->personnel()->create($personnel);

        $user=[
            'username'=>"name1231421",
            'password'=>Hash::make('1234'),
            'rolse'=>'personnel'
        ];

    }
}
