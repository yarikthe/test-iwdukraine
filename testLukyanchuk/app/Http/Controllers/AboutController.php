<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class AboutController extends Controller
{
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
       if (Gate::allows('admin-only', auth()->user())) {
            
            return view('page.page01');

        }else if(Gate::allows('about-page', auth()->user())){

            return view('page.page01');

        }else{
            
            return redirect('/denied')->with('error','You dont have access to page -ABOUT- ! Your Admin Premission without page access!'); 
        }
    }
}
