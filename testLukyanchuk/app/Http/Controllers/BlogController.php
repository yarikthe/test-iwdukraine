<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Auth;

class BlogController extends Controller
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
    public function index(Request $request)
    {
        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('page.page02');

        }else if(Gate::allows('blog-page', auth()->user())){

            return view('page.page02');

        }else{
            
            return redirect('/denied')->with('error','You dont have access to page -BLOG- ! Your Admin Premission without page access!'); 
        }
    }
}
