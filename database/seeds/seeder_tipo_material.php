<?php

use Illuminate\Database\Seeder;
use App\Tipo_item;

class seeder_tipo_material extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$c=new Tipo_item(array(
            'id_tipo_item'=>1,
            'nombre'=>'Material'
        ));
        $c->save();

        $c=new Tipo_item(array(
            'id_tipo_item'=>2,
            'nombre'=>'Mano de Obra'
        ));
        $c->save();
    }
}
