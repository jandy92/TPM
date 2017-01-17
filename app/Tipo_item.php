<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_item extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];
	protected $table = 'tipo_item';
	protected $guarded = [];
	protected $primaryKey='id_tipo_item';

	public function item(){
		return $this->belongsTo('App\Item','id_tipo_item','id_tipo_item');
	}
}
