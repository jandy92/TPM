<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
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

        $editUsers=new Permission(array(
            'name'=>'admin_users',
            'display_name'=>'Administrar usuarios',
            'description'=>'Puede agregar/editar/eliminar usuarios.'
        ));
        $editUsers->save();

        $admin_cot=new Permission(array(
            'name'=>'admin_cot',
            'display_name'=>'Administrar cotizaciones',
            'description'=>'Puede agregar/editar/eliminar una cotizacion.'
        ));
        $admin_cot->save();

        $admin_trab=new Permission(array(
            'name'=>'admin_trab',
            'display_name'=>'Administrar trabajos',
            'description'=>'Puede agregar/editar/eliminar un trabajo.'
        ));
        $admin_trab->save();

        $admin_rolPerm=new Permission(array(
            'name'=>'admin_rolPerm',
            'display_name'=>'Administrar roles y permisos',
            'description'=>'Puede agregar/editar/eliminar roles y permisos.'
        ));
        $admin_rolPerm->save();


        $admin_clicont=new Permission(array(
            'name'=>'admin_clicont',
            'display_name'=>'Administrar clientes y contactos',
            'description'=>'Puede agregar/editar/eliminar clientes y contactos.'
        ));
        $admin_clicont->save();



        $admin->attachPermission($editUsers);
        $admin->attachPermission($admin_rolPerm);

        $user->attachPermission($admin_clicont);
        $user->attachPermission($admin_cot);
        $user->attachPermission($admin_trab);


        //test
        /*
        $admin->attachPermission($admin_cot);
        */
    }
}
