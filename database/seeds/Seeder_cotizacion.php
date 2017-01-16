<?php

use Illuminate\Database\Seeder;

use App\Cliente;
use App\Contacto;
use App\Tipo_trabajo;
use App\Cotizacion;

class Seeder_cotizacion extends Seeder{
    public function run(){
        $cliente=Cliente::find(1);
        $contacto=$cliente->contactos->first();
        $tipo=Tipo_trabajo::find(1);
        $cot=new Cotizacion(array(
        	'nombre'=>'cot_de_pruebas',
        	'descripcion_trabajo'=>'descripcion de la cot',
            'gasto_fijo' => 15000,
            'utilidad' => 15,
        ));

        //$cot->save();
        $cot->cliente()->associate($cliente);
        $cot->contacto()->associate($contacto);
        $cot->tipo_trabajo()->associate($tipo);

        $cot->save();

        //dd($cot);
	    //dd($cliente);
        //dd($contacto);
    }
}
