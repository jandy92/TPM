<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    	
        $admin=new Role(array(
        	'name'=>'admin',
        	'display_name'=>'Administrador',
        	'description'=>'Administrador del sitio.',
        ));
        $admin->save();

        $user=new Role(array(
        	'name'=>'user',
        	'display_name'=>'Usuario',
        	'description'=>'Usuario básico.',
        ));
        $user->save();

        $cont=new Role(array(
        	'name'=>'cont',
        	'display_name'=>'Contador',
        	'description'=>'Contador con acceso restringido a ciertas funcionalidades.',
        ));
        $cont->save();


    }
}
