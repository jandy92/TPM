<?php

use Illuminate\Database\Seeder;
use App\Tipo_trabajo;

class seeder_id_trabajo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c=new Tipo_trabajo(array(
        	'id_tipo_trabajo'=>'1',
        	'nombre'=>'Instrumentación'
        ));
        $c->save();

        $c=new Tipo_trabajo(array(
        	'id_tipo_trabajo'=>'2',
        	'nombre'=>'Seguridad'
        ));
        $c->save();
    }
}
