<?php

namespace App\Http\Controllers\Admin;

use App\Models\Time;
use App\Models\Offer;
use App\Models\Useful;

use App\Models\Objective;
use App\Models\Procedure;

use Illuminate\Http\Request;
use App\Models\Detail_budget;
use App\Http\Requests\Offerform;
use App\Http\Controllers\Controller;
use App\Models\Conclusion;
use App\Models\Feedback;
use App\Models\Problem;
use Illuminate\Support\Facades\Validator;

class Manage_Offer extends Controller
{
    public function addoffer(Offerform $request){
            $offer =  Offer::create( $request->offer );
            if($request->objective)$offer->objective()->createMany($request->objective);
            if($request->procedure)$offer->procedure()->createMany($request->procedure);
            if($request->times)$offer->time()->createMany($request->times);
            if($request->useful)$offer->useful()->createMany($request->useful);
            if($request->detail_budget)$offer->detail_budget()->createMany($request->detail_budget);
            return redirect()->back()->with('error', 'เพิ่มข้อมูลโครงการ สำเร็จแล้ว');
    }



    public function approves(Request $request){
        if($id =$request->id){
            if($request->state ==1|$request->state==2){
                Offer::where('id',$id)
                ->update([
                    "approve"=>$request->state
                ]);
            }
            return redirect()->route('table_approve')->with('state',$request->state);
        }
      if($cancel = $request->cancel){
            Offer::whereIn('id',$cancel)
            ->update([
                "approve"=>2
            ]);
        }
        if($approve = $request->approve){
            Offer::whereIn('id',$approve)
            ->update([
                "approve"=>1
            ]);
      }
      return response(200,200);

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
    public function editoffer(Offerform $request){
            $offer =  Offer::find($request->id);
            $offer->update($request->offer);
            Objective::where('offer_id',$offer->id)->delete();
           $offer->objective()->createMany($request->objective);
           if($request->procedure){
               Procedure::where('offer_id',$offer->id)->delete();
               $offer->procedure()->createMany($request->procedure);
           }
           if($request->times){
                Time::where('offer_id',$offer->id)->delete();
               $offer->time()->createMany($request->times);
           }
           if($request->useful){
                Useful::where('offer_id',$offer->id)->delete();
               $offer->useful()->createMany($request->useful);
           }
           if($request->detail_budget){
                Detail_budget::where('offer_id',$offer->id)->delete();
               $offer->detail_budget()->createMany($request->detail_budget);
           }
        return redirect()->back()->with('error', 'แก้ไขข้อมูลเสนอโครงการ สำเร็จแล้ว');

    }
    public function editsaveresult(Offerform $request)
    {
        $offer =  Offer::find($request->id);
        $offer->status_offer = ($request->status_offer==1)?1:0;
        $offer->conclusion()->createMany($request->conclusion);
        $offer->problem()->createMany($request->problem);
        $offer->feedback()->createMany($request->feedback);
        $offer->status_result = 1;
        $offer->save();
        return redirect()->route('table_saveresult')->with('state',1);


    }

}
