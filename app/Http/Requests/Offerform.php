<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Factory as ValidationFactory;
use PhpParser\Builder\Function_;

class Offerform extends FormRequest
{

    /**
  * return เฉพาะข้อมูล ตามนี้
  *
  * @var array
  */
  protected $onlysaveresult = [
    'conclusion',
    'problem',
    'feedback',
    'cause',
    'id',

  ];
 protected $onlycreate = [
    "name",
    "year",
    "year_id",
    "strategic_t_id",
    "strategic_g_id",
    "strategic_s_id",
    "tactic_t_id",
    "tactic_g_id",
    "tactic_s_id",
    "rational",
    "objective",
    "target_quantity",
    "target_quality",
    "procedure",
    "responsible",
    "location",
    "activity",
    "budget",
    "budget_detail",
    "detail",
    "useful",
    "op_period",
 ];
 protected $onlyupdate = ["id"];

     /**
  * return เฉพาะข้อมูล ตามนี้
  *
  * @var string
  */
 protected $nameroute = "_offer_post";
 /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
 public function authorize()
 {
     return true;
 }

 /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
 public function rules()

 {
     if(request()->routeIs("delete{$this->nameroute}")){
         return $this->rules_delete();
    }
    elseif(request()->routeIs("add{$this->nameroute}")){
         return $this->rules_create();
     }
    elseif(request()->routeIs('edit_saveresult_post')){
         return $this->rules_addgit();
     }
     elseif(request()->routeIs("edit{$this->nameroute}")){
         return $this->rules_update();
     }

 }
 protected function getValidatorInstance(): Validator
    {
        $this->merge([ 'objective'=>json_decode($this->request->get('objective'), true)]);
        $this->merge([ 'procedure'=>json_decode($this->request->get('procedure'), true)]);
        $this->merge([ 'detail'=>json_decode($this->request->get('detail'), true)]);
        $this->merge([ 'useful'=>json_decode($this->request->get('useful'), true)]);
        $this->merge([ 'op_period'=>json_decode($this->request->get('op_period'), true)]);
        $this->merge([ 'conclusion'=>json_decode($this->request->get('conclusion'), true)]);
        $this->merge([ 'problem'=>json_decode($this->request->get('problem'), true)]);
        $this->merge([ 'feedback'=>json_decode($this->request->get('feedback'), true)]);
        return parent::getValidatorInstance();
    }
 protected function rules_addgit(){
    return [];
 }
 protected function rules_create(){
     return [
        "name"=>"required",
        "year"=>"required",
        "year_id"=>"required",
        // "strategic_t_id"=>"",
        // "strategic_g_id"=>"",
        // "strategic_s_id"=>"",
        // "tactic_t_id"=>"",
        // "tactic_g_id"=>"",
        // "tactic_s_id"=>"",
        "rational"=>"required",
        "objective"=>"required",
        "target_quantity"=>"required",
        "target_quality"=>"required",
        "procedure"=>"required",
        "responsible"=>"required",
        "location"=>"required",
        "activity"=>"required",
        "budget"=>"required",
        // "budget_detail"=>"required",
        "useful"=>"required",
        "op_period"=>"required",
    ];

 }
 protected function failedValidation(Validator $validator){

    // throw new HttpResponseException(response()->json(["errors"=>$validator->errors()], 422));
}
 protected function rules_update(){
     return [
        "id"=>"required",
        "name"=>"required",
        "year"=>"required",
        "year_id"=>"required",
        // "strategic_t_id"=>"",
        // "strategic_g_id"=>"",
        // "strategic_s_id"=>"",
        // "tactic_t_id"=>"",
        // "tactic_g_id"=>"",
        // "tactic_s_id"=>"",
        "rational"=>"required",
        "objective"=>"required",
        "target_quantity"=>"required",
        "target_quality"=>"required",
        "procedure"=>"required",
        "responsible"=>"required",
        "location"=>"required",
        "activity"=>"required",
        "budget"=>"required",
        // "budget_detail"=>"required",
        "useful"=>"required",
        "op_period"=>"required",
     ];

 }
 protected function rules_delete(){
     return [
     ];
 }
    /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
 public function attributes()
 {
     return [
     ];
 }
 public function messages()
 {
     return [
     ];
 }

 protected function passedValidation_add($ac){
    $requests = collect($this->request)->toArray();
    $request = [];
    if($ac=="edit"){
        $request['id'] = $requests['id'];
    }
     if($objective = $requests['objective']){
        $request['objective'] = collect($objective)->map(function($item){
            return  ["name"=>$item];
        })->toArray();
     }
     if($procedure = $requests['procedure']){
        $request['procedure'] = collect($procedure)->map(function($item){
            return  ["name"=>$item];
        })->toArray();
     }
     if($useful = $requests['useful']){
        $request['useful'] = collect($useful)->map(function($item){
            return  ["name"=>$item];
        })->toArray();
     }
     if($op_period = $requests['op_period']){
        $request['times'] = collect($op_period)->map(function($item){
            return  [
                "activity"=>$item['name'],
                "start"=>$item['start'],
                "stop"=>$item['end'],
            ];
        })->toArray();
     }
     if($detail_budget = $requests['detail']){
        $request['detail_budget'] = collect($detail_budget)->map(function($item){
            return  [
                "detail"=>$item['detail'],
                "amount"=>$item['price'],
            ];
        })->toArray();
     }
     $request['offer'] = array_merge( collect($this->request)->only(
        "name",
        "rational",
        "responsible",
        "user_id",
        "location",
        "budget",
        "year",
        "target_quantity",
        "target_quality",
        "year_id",
        "strategic_t_id",
        "strategic_g_id",
        "strategic_s_id",
        "tactic_t_id",
        "tactic_g_id",
        "tactic_s_id",
        )->toArray(),["user_id" => auth()->user()->id]);
        return  $this->request->replace($request);


 }
 protected function passedValidation_onlysaveresult(){
    $requests = collect($this->request)->toArray();
    $request = [];
     $request['id'] = $requests['id'];
     $request['status_offer'] = $requests['status_offer'];
     if($objective = $requests['conclusion']){
        $request['conclusion'] = collect($objective)->map(function($item){
            return  ["name"=>$item];
        })->toArray();
     }
     if($objective = $requests['problem']){
        $request['problem'] = collect($objective)->map(function($item){
            return  ["name"=>$item];
        })->toArray();
     }
     if($objective = $requests['feedback']){
        $request['feedback'] = collect($objective)->map(function($item){
            return  ["name"=>$item];
        })->toArray();
     }
    return  $this->request->replace($request);


 }
 public function passedValidation()
 {
    if(request()->routeIs("delete{$this->nameroute}")){
    }
    elseif(request()->routeIs("add{$this->nameroute}")){
        return $this->passedValidation_add("add");
    }
    elseif(request()->routeIs('edit_saveresult_post')){
        return $this->passedValidation_onlysaveresult();
    }
    elseif(request()->routeIs("edit{$this->nameroute}")){
        return $this->passedValidation_add("edit");
    }


 }
}
