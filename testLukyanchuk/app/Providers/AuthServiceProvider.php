<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\User;
use App\Perm;
use Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         '//App\Model' => 'App\Policies\ModelPolicy',
    ];


    
    public function boot()//GateContract $gate)
    {
        $this->registerPolicies();


        //Rule 01 Get access to page if you superadmin

        Gate::define('admin-only', function($user){

            foreach ($user->roles as $role) {
                
                if($role->name == 'SUPERADMIN')
                {
                    return true;
                }

            }

            return false;

        });



        //Rule 02 - 04  Get access to page if you admin and have premission to this page

        Gate::define('page-page', function($user){

            foreach ($user->roles as $role) {
                
                if($role->name == 'ADMIN')
                {

                    foreach ($user->perm as $p) {

                        if($p->name == 'page' ){

                            return true;

                        }

                    }
                    
                }

            }

            return false;

        });

         Gate::define('blog-page', function($user){

            foreach ($user->roles as $role) {
                
                if($role->name == 'ADMIN')
                {

                    foreach ($user->perm as $p) {

                        if($p->name == 'blog' ){

                            return true;

                        }

                    }
                    
                }

            }

            return false;

        });

          Gate::define('about-page', function($user){

            foreach ($user->roles as $role) {
                
                if($role->name == 'ADMIN')
                {

                    foreach ($user->perm as $p) {

                        if($p->name == 'about' ){

                            return true;

                        }

                    }
                    
                }

            }

            return false;

        });


        //END - Rule 02 - 04

    }
}
