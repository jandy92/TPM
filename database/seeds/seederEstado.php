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
            'color'=>'43DBFF',
            'color_letra'=>'9EECFE'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 2,
        	'nombre'=>'Pagado',
            'color'=>'A5A5A5',
            'color_letra'=>'FFFFFF'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 3,
        	'nombre'=>'Ejecutado cot. enviada',
            'color'=>'F79646',
            'color_letra'=>'FFC595'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 4,
        	'nombre'=>'Por pagar',
            'color'=>'92D050',
            'color_letra'=>'CFF2A8'
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
            'color'=>'948B54',
            'color_letra'=>'E0D9AD'
        	));
        $e->save();
        
        $e = new Estado(array(
        	'id_estado'=> 7,
        	'nombre'=>'Por cobrar',
            'color'=>'FF0000',
            'color_letra'=>'FF6464'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 8,
        	'nombre'=>'Ejecutado por cotizar',
            'color'=>'F79646',
            'color_letra'=>'FFC595'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 9,
        	'nombre'=>'Nota de credito',
            'color'=>'8064A2',
            'color_letra'=>'D0C3E0'
        	));
        $e->save();

        $e = new Estado(array(
        	'id_estado'=> 10,
        	'nombre'=>'En ejecución',
            'color'=>'FFFF00',
            'color_letra'=>'9B9B00'
        	));
        $e->save();
    }
}
