<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\RoleUser;
use App\PremUser;
use App\User;
use App\Perm;
use Auth;
use DB;

class SuperAdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:SUPERADMIN');
    }

    public function index()
    {
    	$users = User::with('roles')->get();
        $permUser = PremUser::all();
        $perm = Perm::with('users')->get();
        //$perm = User::with('perm')->get();

        $userRole = Auth::user()->roles->pluck('name');

        if (! $userRole->contains('SUPERADMIN')) {

            return redirect('/denied');
        }

    	return view('superadmin.home', ['users' => $users, 'perm' => $perm, 'permUser' => $permUser]);

        //return view('superadmin.home');
    }

    public function addPerm(Request $request)
    {

        $user_id = $request->input('user_id');
        $perm_id = $request->input('perm_id');      

        $data = array('user_id' => $user_id, 'perm_id' => $perm_id);

        if(DB::table('perm_user')->insert($data)){

            return redirect('/superadmin')->with('success','Good! You have premission added!');             

         }else{

             return redirect('/superadmin')->with('error','Can not add permission!'); 
         }


    }

    public function delPerm(Request $request, $id)
    {

        $userPrem = PremUser::find($id);

        if($userPrem->delete()){

            return redirect('/superadmin')->with('success','Good! premission deleted!'); 

        }else{

             return redirect('/superadmin')->with('error','Can not deleete permission!'); 
         }

    }
}
