<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
class UsersTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $role_admin=Role::whereName('admin')->first();
        $role_user=Role::whereName('user')->first();
        $u=new User(array(
        	'name'=>'admin',
        	'email'=>'admin@localhost.com',
        	'password'=>bcrypt('admin')
        ));
        $u->save();
        $u->attachRole($role_admin);
        
        $u=new User(array(
            'name'=>'Alejandra',
            'email'=>'ale_hg13@hotmail.com',
            'password'=>bcrypt('alejandra')
        ));
        $u->save();
        $u->attachRole($role_user);

        $u=new User(array(
            'name'=>'Patricio',
            'email'=>'patricio@localhost.com',
            'password'=>bcrypt('patricio')
        ));
        $u->save();
        $u->attachRole($role_user);
    }
}
