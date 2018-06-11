<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleAdmin extends Model
{
     public $timestamps = false;
     public $table = 'role_admins';



public function role(){

	return $this->hasOne('App\Role','role_id','id');
}


}