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
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_contacto')->unsigned();
            $table->integer('id_tipo_trabajo')->unsigned();
            $table->integer('gasto_fijo');
            $table->integer('utilidad');
            $table->timestamps();
            
            $table->foreign('id_cliente')->references('id_cliente')->on('cliente')->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreign('id_contacto')->references('id_contacto')->on('contacto')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_tipo_trabajo')->references('id_tipo_trabajo')->on('tipo_trabajo')->onUpdate('cascade')->onDelete('cascade');
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
