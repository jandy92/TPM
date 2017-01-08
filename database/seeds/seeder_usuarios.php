<?php

use Illuminate\Database\Seeder;
use App\User;
class seeder_usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $u=new User(array(
        	'name'=>'admin',
        	'email'=>'admin@localhost.com',
        	'password'=>bcrypt('admin')
        ));
        $u->save();
    }
}
