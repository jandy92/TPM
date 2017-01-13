<?php

use Illuminate\Database\Seeder;
use App\Tipo_material;

class seeder_tipo_material extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$c=new Tipo_material(array(
            'nombre'=>'CCU',
            'rut_cliente'=>'18008790-7'
        ));
        $c->save();
    }
}
