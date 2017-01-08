<?php
use App\Role;
use Illuminate\Database\Seeder;

class seeder_roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $admin=new Role(array(
            'name'=>'admin',
            'display_name'=>'Administrador',
            'description'=>'Encargado del mantenimiento del sistema a nivel estructural',
        ));
        $admin->save();

        $usuario=new Role(array(
            'name'=>'user',
            'display_name'=>'Usuario',
            'description'=>'Usuario estandar.',
        ));
        $usuario->save();

        $usuario=new Role(array(
            'name'=>'cont',
            'display_name'=>'Contador',
            'description'=>'Contador.',
        ));
        $usuario->save();
    }
}
