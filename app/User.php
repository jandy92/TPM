<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Klaravel\Ntrust\Traits\NtrustUserTrait;

use App\Role;

class User extends Authenticatable{
    use Notifiable;
    use NtrustUserTrait; // add this trait to your user model
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public function getRolesNames(){
        $roles=Role::all();
        $user_roles=array();
        foreach ($roles as $r) {
            if($this->hasRole($r->name)){
                array_push($user_roles, $r->display_name);
            }
        }
        return $user_roles;
    }
    
    public function getRoles(){
        $roles=array();
        $R=Role::all();
        foreach ($R as $rol) {
            if($this->hasRole($rol->name))
            array_push($roles, $rol);
        }
        return $roles;
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $roleProfile = 'user';

}
