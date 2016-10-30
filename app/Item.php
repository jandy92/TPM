<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model{
    protected $table='item';
    protected $guarded = ['id'];

    function trabajo(){
    	return $this->belongsTo('App\Trabajo','id_trabajo');
    }
}
