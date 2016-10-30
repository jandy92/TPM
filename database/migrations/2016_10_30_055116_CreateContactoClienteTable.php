<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('contacto_cliente',function(Blueprint $t){
            $t->string('contacto_rut');
            $t->string('cliente_rut');
            $t->foreign('contacto_rut')->references('rut')->on('contacto');
            $t->foreign('cliente_rut')->references('rut')->on('cliente');
            $t->primary(['contacto_rut','cliente_rut']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('contacto_cliente');
    }
}
