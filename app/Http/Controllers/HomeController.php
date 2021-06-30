<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function pageindex()
    {
        return view('page.index');
    }
    public function pagecompanies()
    {
        return view('page.companies');
    }
    public function pagerecurments()
    {
        return view('page.recurments');
    }
    public function pagesearchjob()
    {
        return view('page.searchjob');
    }
    public function pageservices()
    {
        return view('page.services');
    }


}
