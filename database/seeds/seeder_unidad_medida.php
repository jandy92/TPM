<?php

use Illuminate\Database\Seeder;
use App\Unidad_medida;

class seeder_unidad_medida extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u=new Unidad_medida();
        $u->nombre="Kilogramo";
        $u->nombre_abreviacion="kg";
        $u->save();

        $u=new Unidad_medida();
        $u->nombre="Gramo";
        $u->nombre_abreviacion="gr";
        $u->save();

        $u=new Unidad_medida();
        $u->nombre="Unidad";
        $u->nombre_abreviacion="unid.";
        $u->save();
    }
}
