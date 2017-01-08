<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class seeder_usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $admin=Role::whereName('admin')->first();
        $user =Role::whereName('user') ->first();
        $cont =Role::whereName('cont') ->first();

        $u=new User(array(
            'name'=>'admin',
            'email'=>'admin@localhost.com',
            'password'=>bcrypt('admin')
        ));
        $u->save();

        $u->attachRole($admin);

        $u=new User(array(
            'name'=>'user',
            'email'=>'user@localhost.com',
            'password'=>bcrypt('user')
        ));
        $u->save();

        $u->attachRole($user);

        $u=new User(array(
            'name'=>'contador',
            'email'=>'cont@localhost.com',
            'password'=>bcrypt('cont')
        ));
        $u->save();

        $u->attachRole($cont);

       // echo $user->name . PHP_EOL;
    }
}
