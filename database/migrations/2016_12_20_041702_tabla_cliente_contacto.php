<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaClienteContacto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cliente_contacto', function (Blueprint $table){
            $table->string('rut_cliente');
            $table->integer('id_contacto')->unsigned();

            $table->foreign('rut_cliente')->references('rut_cliente')->on('cliente')->onDelete('cascade');
            $table->foreign('id_contacto')->references('id_contacto')->on('contacto')->onDelete('cascade');
            $table->primary(['rut_cliente','id_contacto']);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_contacto');

    }
}
