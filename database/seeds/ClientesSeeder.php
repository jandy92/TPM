<?php

use Illuminate\Database\Seeder;

use App\Cliente;
class ClientesSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $c1=new Cliente(array(
        	'nombre'=>'Cliente1',
        	'rut'=>'12.772.742-2',
        	'direccion'=>'calleFalsa #123',
        	'telefono'=>'12354789',
        	'giro'=>'Giro1'
        ));
        $c1->save();

        $c2=new Cliente(array(
        	'nombre'=>'Cliente2',
        	'rut'=>'18103808-k',
        	'direccion'=>'SiempreViva #123',
        	'telefono'=>'12354789',
        	'giro'=>'Giro2'
        ));
        $c2->save();
    }
}
