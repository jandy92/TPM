<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table='cliente';
    protected $guarded = [];

    function contactos(){
    	return $this->hasMany('App/Contacto');
    }
}
