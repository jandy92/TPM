<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class seeder_permisos extends Seeder{
    public function run(){
    	//OBTENER LOS ROLES BASICOS (deben existir previamente)

        $admin=Role::whereName('admin')->first();
        $user= Role::whereName('user')->first();
        $cont= Role::whereName('cont')->first();

    	//PERMISOS
    	$man_cots=new Permission(array(
    		'name'=>'man_cots',
    		'display_name'=>'Administrar cotizaciones',
    		'description'=>'Puede administrar cotizaciones'
    	));
    	$man_cots->save();

    	$man_users=new Permission(array(
    		'name'=>'man_users',
    		'display_name'=>'Administrar usuarios',
    		'description'=>'Puede administrar usuarios'
    	));
    	$man_users->save();

    	$man_clients=new Permission(array(
    		'name'=>'man_clients',
    		'display_name'=>'Administrar clientes',
    		'description'=>'Puede administrar clientes'
    	));
    	$man_clients->save();

    	$man_contacts=new Permission(array(
    		'name'=>'man_contacts',
    		'display_name'=>'Administrar contactos',
    		'description'=>'Puede administrar contactos'
    	));
    	$man_contacts->save();

    	//ASIGNAR PERMISOS A ROLES
    	
    	$admin->attachPermission($man_users);
    	$user->attachPermissions(array($man_cots,$man_clients,$man_contacts));
		
    }
}
