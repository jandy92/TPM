<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
	protected $table = 'estado';
    //
    public function trabajos()
    {
        return $this->hasMany('App\Trabajo','id_estado', 'id_estado');
    }
}
