<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class Createuser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'position'=>'เจ้าหน้าที่ยาม'
            ];
            User::create($user)->personnel()->create($personnel);
        }


    }
}
