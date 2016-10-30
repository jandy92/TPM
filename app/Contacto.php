<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model{
    protected $table='contacto';
    protected $guarded = [];

    function clientes(){
    	return $this->hasMany('App\Cliente');
    }
}
