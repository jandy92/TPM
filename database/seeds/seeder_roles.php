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
        	'description'=>'Encargado del mantenimiento del sistema a nivel funcional',
        ));
        $admin->save();
    }
}
