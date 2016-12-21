<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table='cliente';
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey='rut_cliente';
    
}