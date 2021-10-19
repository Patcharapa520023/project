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

}
