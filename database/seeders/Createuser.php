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
        return User::create([
            'name' =>"Patcharapa",
            'email' => "patcha240862@gmail.com",
            'password' => Hash::make("123"),
            'rolse'=>'admin'
        ]);
    }
}
