<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ADMIN');
    }
    
    public function index()
    {
    	$userRole = Auth::user()->roles->pluck('name');

        if (! $userRole->contains('ADMIN')) {

            return redirect('/denied');
        }

        return view('admin.home');
    }
}
