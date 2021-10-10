<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;


class Manage_Offer extends Controller
{
    public function addoffer(Request $request){
        return redirect()->back()->withInput();
        dd($request->toArray());
        $request->merge([
            'name_add_m' => !is_null($request->name_add_m) ? json_decode($request->name_add_m) : null
        ]);
        $input =  $request->all();
        Validator::make($request->all(), [
            'year' => 'required',
            'name_add_m' => 'required',
        ])->validate();
        $offer = collect($input['name_add_m'])->map(function($item) use($input){
            return  [
                "name"=>$item,
                "year_id"=>$input['year']
            ];
        });
        Offer::insert($offer->toArray());
        return redirect()->back()->with('error', 'เพิ่มข้อมูลเสนอโครงการ สำเร็จแล้ว');

    }
    public function deleteoffer(Request $request){
        Offer::find($request->all()['id'])->delete();
        return back();
    }

    protected function validator(array $data,$tf=false)
    {
        $vali = [

            "title" => ['required', 'string', 'max:255'],
            "name" => ['required', 'string', 'max:255'],
            "year" => ['required', 'string', 'max:255'],


        ];
        if($tf&&$tf==$data['username']){
         $vali["username"] = ['required', 'string','max:20'];
        }else {
         $vali["username"] = ['required', 'string','max:20', 'unique:users'];

        }
        return Validator::make($data,$vali);
    }
    public function editoffer(Request $request){
        $input =  $request->all();
        $offer=[
            'name'=>$input['name_add'],
            'year_id'=>$input['year'],
        ];
        $edit = Offer::find($input['id']);
        $edit ->update($offer);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลเสนอโครงการ สำเร็จแล้ว');

    }

}
