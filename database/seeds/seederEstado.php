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
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 2,
        	'nombre'=>'Pagado',
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 3,
        	'nombre'=>'Ejecutado cot. enviada',
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 4,
        	'nombre'=>'Por pagar',
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 5,
        	'nombre'=>'Cotizado',
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 6,
        	'nombre'=>'No adjudicado',
        	));
        $e->save();
        
        $e = new Estado(array(
        	'id_estado'=> 7,
        	'nombre'=>'Por cobrar',
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 8,
        	'nombre'=>'Ejecutado por cotizar',
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 9,
        	'nombre'=>'Nota de credito',
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 10,
        	'nombre'=>'En ejecución',
        	));
        $e->save();
    }
}
