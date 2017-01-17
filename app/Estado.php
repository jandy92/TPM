<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
	protected $table = 'estado';
    protected $primaryKey = 'id_estado';
     protected $guarded = ['id_estado'];
    public function trabajos()
    {
        return $this->hasMany('App\Trabajo','id_estado', 'id_estado');
    }
}
