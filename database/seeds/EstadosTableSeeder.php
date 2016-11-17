<?php

use Illuminate\Database\Seeder;

use App\Estado;
class EstadosTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $e=new Estado(array(
        	'alias'=>'nuevo',
        	'nombre'=>'Trabajo nuevo',
            'color'=>'#43DBFF',
        ));
        $e->save();
        
        $e=new Estado(array(
        	'alias'=>'cotizado',
        	'nombre'=>'Cotizado',
            'color'=>'#FFFFFF',
        ));
        $e->save();
        
        $e=new Estado(array(
        	'alias'=>'por_pagar',
        	'nombre'=>'Por Pagar',
            'color'=>'#F79646',
        ));
        $e->save();
        
        $e=new Estado(array(
        	'alias'=>'pagado',
        	'nombre'=>'Pagado',
            'color'=>'#A6A6A6',
        ));
        $e->save();

        $e=new Estado(array(
        	'alias'=>'no_adjudicado',
        	'nombre'=>'No Adjudicado',
            'color'=>'#948A54',
        ));
        $e->save();

        $e=new Estado(array(
        	'alias'=>'por_cobrar',
        	'nombre'=>'Por cobrar',
            'color'=>'#FF0000',
        ));
        $e->save();

        $e=new Estado(array(
        	'alias'=>'en_ejecucion',
        	'nombre'=>'En ejecución',
            'color'=>'#FFFF00',
        ));
        $e->save();

        $e=new Estado(array(
        	'alias'=>'nota_credito',
        	'nombre'=>'Nota de crédito',
            'color'=>'#8064A2',
        ));
        $e->save();

        $e=new Estado(array(
        	'alias'=>'ejec_cot_env',
        	'nombre'=>'Ejecutado cotización enviada',
            'color'=>'#F79646',
        ));
        $e->save();

        $e=new Estado(array(
        	'alias'=>'ejec_por_cotizar',
        	'nombre'=>'Ejecutado por cotizar',
            'color'=>'#F79646',
        ));
        $e->save();
    }
}
