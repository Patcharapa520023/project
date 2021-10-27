<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tactics;
use App\Models\Strategic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Manage_Tactics extends Controller
{
    public function addtactics(Request $request){

        $request->merge([
            'name_add_m' => !is_null($request->name_add_m) ? json_decode($request->name_add_m) : null
        ]);

        $input =  $request->all();
        Validator::make($request->all(), [
            'year' => 'required',
            'name_yut' => 'required',
            'name_add_m' => 'required',
            'category' => 'required|in:1,2,3',
        ])->validate();


        $tactics = collect($input['name_add_m'])->map(function($item) use($input){
            return  [
                "name"=>$item,
                "year_id"=>$input['year'],
                'strategic_id'=>$input['name_yut'],
                "category"=>$input['category']
            ];
        });
        Tactics::insert($tactics->toArray());
        return redirect()->back()->with('error', 'เพิ่มข้อมูลกลยุทธ์ สำเร็จแล้ว');

    }
    public function deletetactics(Request $request){
        Tactics::find($request->all()['id'])->delete();
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
    public function edittactics(Request $request){

        Validator::make($request->all(), [
            'id' => 'required',
            'year' => 'required',
            'name_yut' => 'required',
            'name_add' => 'required',
            'category' => 'required|in:1,2,3',
            ])->validate();
            $input =  $request->all();
        $tactics=[
            "name"=>$input['name_add'],
            "year_id"=>$input['year'],
            'strategic_id'=>$input['name_yut'],
            "category"=>$input['category']
        ];

        $edit = Tactics::find($input['id']);
        $edit ->update($tactics);
        return redirect()->back()->with('error', 'แก้ไขข้อมูลกลยุทธ์ สำเร็จแล้ว');

    }
     public function optionName_year(Request $request)
    {
        return  ($id  = $request->id)
        ?response()->json(Strategic::orderBy('name','DESC')->where('year_id',$id)->select('name','id')->get(),200)
        :response()->json([],400)
        ;

    }
}
