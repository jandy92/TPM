<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(seeder_clientes::class);
        $this->call(seeder_roles::class);
        $this->call(seeder_permisos::class);
        $this->call(seeder_usuarios::class);
        $this->call(seeder_id_trabajo::class);
        $this->call(seeder_contactos::class);
        $this->call(Seeder_cotizacion::class);
        $this->call(seeder_tipo_material::class);

    }
}
