<?php

use Illuminate\Database\Seeder;
use App\Estado;

class seederEstado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e = new Estado(array(
        	'id_estado'=> 1,
        	'nombre'=>'Trabajo nuevo',
            'color'=>'43DBFF'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 2,
        	'nombre'=>'Pagado',
            'color'=>'A5A5A5'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 3,
        	'nombre'=>'Ejecutado cot. enviada',
            'color'=>'F79646'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 4,
        	'nombre'=>'Por pagar',
            'color'=>'92D050'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 5,
        	'nombre'=>'Cotizado',
            'color'=>'FFFFFF'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 6,
        	'nombre'=>'No adjudicado',
            'color'=>'948B54'
        	));
        $e->save();
        
        $e = new Estado(array(
        	'id_estado'=> 7,
        	'nombre'=>'Por cobrar',
            'color'=>'FF0000'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 8,
        	'nombre'=>'Ejecutado por cotizar',
            'color'=>'F79646'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 9,
        	'nombre'=>'Nota de credito',
            'color'=>'8064A2'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 10,
        	'nombre'=>'En ejecución',
            'color'=>'FFFF00'
        	));
        $e->save();
    }
}
