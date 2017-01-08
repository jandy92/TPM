<?php

use Illuminate\Database\Seeder;
use App\Cliente;
class seeder_clientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c=new Cliente(array(
        	'nombre'=>'CCU',
        	'rut_cliente'=>'18008790-7',
        	'direccion'=>'Callefalsa#123',
        	'giro'=>'giro1',
        	'telefono'=>'1234567890',
        ));
        $c->save();
    }
}
