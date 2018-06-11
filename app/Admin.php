<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;





class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


   public function roleadmin(){

    return $this->hasManyThrough('App\Role','App\RoleAdmin','admin_id','id','id');

    }


    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
          return $this->hasAnyRole($roles) || 
                 abort(404, 'This action is unauthorized.');
      }
      return $this->hasRole($roles) || 
             abort(404, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles)
    {
      return null !== $this->roleadmin()->whereIn('name', $roles)->first();
    }


    public function hasRole($role)
    {
      return null !== $this->roleadmin()->where('name', $role)->first();
    }

}


