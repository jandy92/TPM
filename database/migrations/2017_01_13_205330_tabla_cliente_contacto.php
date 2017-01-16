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
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_contacto')->unsigned();
            $table->softDeletes();


            $table->foreign('id_cliente')->references('id_cliente')->on('cliente')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_contacto')->references('id_contacto')->on('contacto')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['id_cliente','id_contacto']);



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
