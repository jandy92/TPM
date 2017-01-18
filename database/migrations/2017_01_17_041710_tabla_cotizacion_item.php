<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaCotizacionItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('cotizacion_item', function (Blueprint $table){
            $table->integer('id_item')->unsigned();
            $table->integer('folio_cotizacion')->unsigned();
            
            $table->integer('cantidad')->nullable();
            $table->integer('precio_unitario')->nullable();

            $table->foreign('id_item')->references('id_item')->on('item')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('folio_cotizacion')->references('folio_cotizacion')->on('cotizacion')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['id_item','folio_cotizacion']);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('cotizacion_item');
    }
}