<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perm extends Model
{
	protected $table = "perm";

    public function roles()
    {
    	return $this->belongsToMany('App\Role');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
    
}
