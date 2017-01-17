<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $guarded = ['id_trabajo'];
    protected $primaryKey = 'id_trabajo';
    protected $table = 'trabajo';
    public function estado()
    {
    	return $this->belongsTo('App\Estado','id_estado', 'id_estado');
    }
}
