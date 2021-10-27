<?php

namespace App\Http\Controllers\Admin;
use App\Models\Strategic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Manage_Strategic extends Controller
{
    public function addstrategic(Request $request){
        $request->merge([
            'name_add_m' => !is_null($request->name_add_m) ? json_decode($request->name_add_m) : null
        ]);
        $input =  $request->all();
        Validator::make($request->all(), [
            'year' => 'required',
            'name_add_m' => 'required',
            'category' => 'required|in:1,2,3',

        ])->validate();
        $strategic = collect($input['name_add_m'])->map(function($item) use($input){
            return  [
                "name"=>$item,
                "year_id"=>$input['year'],
                "category"=>$input['category']
            ];
        });
        Strategic::insert($strategic->toArray());
        return redirect()->back()->with('error', 'เพิ่มข้อมูลยุทธศาสตร์ สำเร็จแล้ว');

    }
    public function deletestrategic(Request $request){
        Strategic::find($request->all()['id'])->delete();
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
    public function editstrategic(Request $request){
        $input =  $request->all();
        $strategic=[
            'name'=>$input['name_add'],
            'year_id'=>$input['year'],
        ];
        $edit = Strategic::find($input['id']);
        $edit ->update($strategic);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลยุทธ์ศาสตร์ สำเร็จแล้ว');

    }


}
