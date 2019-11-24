<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Role;
use App\RoleUser;
use App\User;

Route::get('/', function () {
    return redirect('/testlukyanchuk');
});

Route::get('/about', 'AboutController@index');
Route::get('/blog', 'BlogController@index');
Route::get('/page', 'PageController@index');

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function(){

    Route::get('/home', 'HomeController@index');
    Route::get('/admin', 'AdminController@index');
    Route::get('/denied', 'HomeController@permDenied')->name('denied');

    Route::group(['middleware' => ['admin']], function(){
        Route::get('/superadmin', 'SuperAdminController@index');

        Route::post('/add_permission','SuperAdminController@addPerm');
        Route::get('/superadmin/permission/delete/{id}', 'SuperAdminController@delPerm')->name('perm.del');
    });
    /*
    Route::get('/adminpanel', function(){

    	$role_user = RoleUser::find(Auth::user()->id);

    	 if($role_user->role_id == 1)
    	 {
    	 	return view('admin.home');
    	 }
    	 if($role_user->role_id == 2)
    	 {
            $users = User::all();
            $roles = Role::all();
            $role_user_ = RoleUser::all();

    	 	return view('superadmin.home', ['users' => $users, 'roles' => $roles, 'role_user_' => $role_user_]);
    	 }

    });
    */

});
