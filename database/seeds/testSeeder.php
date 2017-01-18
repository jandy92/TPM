<?php

use Illuminate\Database\Seeder;
use App\Cotizacion;
class testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$texto='2';
    	$cots=Cotizacion::whereHas('contacto',function($q) use($texto){
    		$q->where('nombre','like','%'.$texto.'%');
    	})->orWhereHas('cliente',function($q) use($texto){
    		$q->where('nombre','like','%'.$texto.'%');}
    	)->orWhere('nombre','like','%'.$texto.'%')->orWhere('folio_cotizacion','like','%'.$texto.'%')->get();
		//solo para imprimir
        foreach($cots as $cot){
        	var_dump($cot->nombre);
        }
    }
}
