<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad_medida extends Model
{
    protected $primaryKey='id_unidad';
    protected $guarded=['id_unidad',];
    protected $table='unidad_medida';
}
