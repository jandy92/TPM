<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaCotizacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion', function (Blueprint $table){
            $table->increments('folio_cotizacion');
            $table->string('nombre');
            $table->string('descripcion_trabajo');
            $table->string('rut_cliente');
            $table->integer('id_contacto')->unsigned();
            $table->integer('id_tipo_trabajo')->unsigned();

            
            
            $table->foreign('rut_cliente')->references('rut_cliente')->on('cliente')->onDelete('cascade');
            $table->foreign('id_contacto')->references('id_contacto')->on('contacto')->onDelete('cascade');
            $table->foreign('id_tipo_trabajo')->references('id_tipo_trabajo')->on('tipo_trabajo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacion');
    }
    
}
