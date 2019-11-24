<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:SUPERADMIN');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('page.page03');

        }else if(Gate::allows('page-page', auth()->user())){

            return view('page.page03');

        }else{
            
            return redirect('/denied')->with('error','You dont have access to page -PAGE- ! Your Admin Premission without page access!'); 
        }
    }
}
