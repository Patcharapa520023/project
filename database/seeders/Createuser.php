<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
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
        'dep_name'=>'กองการศึกษา',
        'address'=>'เทศบาลสิงหนคร',
        'telnum'=>'073274707',
        'fax'=>'458788599'
        ]);
        for ($i=1; $i <80 ; $i++) {
            $user=[
                'email'=>"ft@gmaidl$i.com",
                'password'=>Hash::make('1234'),
                'rolse'=>'personnel'
            ];
            $personnel=[
                'title'=>'นางสาว',
                'name'=>'เจริญ'	,
                'lastname'=>'มาก'	,
                'address'=>'45ซ.ยินดีเจริญจ.พัทลุง'	,
                'telnum'=>'0891234881',
                'position'=>'เจ้าหน้าที่ยาม',
                'department_id'=>'1'
            ];
            User::create($user)->personnel()->create($personnel);
        }


    }
}
