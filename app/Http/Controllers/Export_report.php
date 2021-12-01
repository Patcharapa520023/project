<?php

namespace App\Http\Controllers;

use App\Exports\Export_dd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class Export_report extends Controller
{
    public function export(Request $request)
    {
        return Excel::download(new Export_dd($request->id), 'โครงการที่_'.$request->id.'.xlsx');
    }
}
