<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function columcontro($id,$deletename,$tablename,$show=true){
        $idbase =$id;
        $csrf = csrf_field();
        return "<div class='table-data-feature'>".(($show)?"<a  href='show/$idbase/$tablename'>
        <button class='item show' data-toggle='tooltip' data-placement='top' title=' data-original-title='More'>
            <i class='fa fa-search-plus'></i>
        </button>
        </a>" :""). "<a  href='edit/$idbase/$tablename'>
            <button class='item edit' data-toggle='tooltip' data-placement='top' title=' data-original-title='Edit'>
                <i class='fa fa-edit'></i>
            </button>
            </a>
            <form method='POST' action='delete/$tablename' onSubmit='dbdelete(this,`$deletename`)'>
                $csrf
                <input type='hidden' name='id' value='$id'>
                <input type='hidden' name='id2' value='4'>
            <button class='item delete' data-toggle='tooltip' data-placement='top' title=' data-original-title='Delete'>
                <i class='fa fa-trash-o'></i>
            </button>
            </form>
            </div>";

    }
    public function columcontroo($id,$deletename,$tablename,$show=true){
        $idbase =$id;
        $csrf = csrf_field();
        return "<div class='table-data-feature'>".(($show)?"<a  href='show/$idbase/$tablename'>
        <button class='item show' data-toggle='tooltip' data-placement='top' title=' data-original-title='More'>
            <i class='fa fa-search-plus'></i>
        </button>
        </a>" :"").
         "
            <form method='POST' action='/dowload/xlsx' >
                 $csrf
                 <input type='hidden' name='id' value='$id'>
            <button class='item edit bg-success' data-toggle='tooltip ' data-placement='top' title=' data-original-title='Edit'>
                <i class='fa fa-file-excel-o '></i>
            </button>
            </form>

            </div>";

    }
    public function saveresult($id,$type ){
        $idbase =$id;
        $route = route('edit_saveresult', ['id' => $id]);
        if($type ==0){
            return "<div class='table-data-feature'>
                    <a  href='$route'>
                    <div type='button' class='btn btn-outline-success btn-sm'>
                    เพิ่มข้อมูลบันทึกผล
                    </div>
                    </a>
                </div>";

            }else{
            return "<div class='table-data-feature text-success '>
                   บันทึกผลเเล้ว
                </div>";

        }

    }
    public function approve($id,$deletename,$tablename){
        $idbase =$id;
        $csrf = csrf_field();
        return "<div class='table-data-feature'>
            <div class='radio-toolbar'>

                <input type='radio' id='approve$id' name='dec$id' value='approve' value_id='$id' >
                <label for='approve$id'><i class='pe-7s-check' value_id='$id'></i> อนุมัติ</label >

                <input type='radio' id='deny$id' name='dec$id' value='reject' class='delete ' value_id='$id'>
                <label for='deny$id'><i class='pe-7s-close-circle' value_id='$id'></i>ไม่อนุมัติ</label>
            </div>
            </div>";

    }

}
