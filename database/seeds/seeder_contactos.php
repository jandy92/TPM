<?php

use Illuminate\Database\Seeder;
use App\Contacto;
use App\Cliente;
class seeder_contactos extends Seeder
{
    /*
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$cli=Cliente::find(1);
        $c=new Contacto(array(
        	'nombre'=>'Patricio',
        	'apellido'=>'Suazo',
        	'email'=>'patovaldivia4@gmail.com',
        	'telefono'=>'232323'

        ));
        $c->save();
        $cli->contactos()->attach($c->id_contacto);

        $cli=Cliente::find(2);
        $c=new Contacto(array(
        	'nombre'=>'Jaime',
        	'apellido'=>'Klenner',
        	'email'=>'jklenner@gmail.com',
        	'telefono'=>'232323',

        ));
        $c->save();
        $cli->contactos()->attach($c->id_contacto);

        $cli=Cliente::find(2);
        $c=new Contacto(array(
        	'nombre'=>'Pedro',
        	'apellido'=>'Perez',
        	'email'=>'pperez@gmail.com',
        	'telefono'=>'232323',

        ));
        $c->save();
        $cli->contactos()->attach($c->id_contacto);

        $cli=Cliente::find(3);
        $c=new Contacto(array(
        	'nombre'=>'Juana',
        	'apellido'=>'Lopez',
        	'email'=>'jlopez@gmail.com',
        	'telefono'=>'232323',

        ));
        $c->save();
        $cli->contactos()->attach($c->id_contacto);
    }
}
