<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model{
    protected $table='estado';
    protected $guarded = ['id'];

    function trabajos(){
    	return $this->belongsToMany('App\trabajos');
    }
}
