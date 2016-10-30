<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajoTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('trabajo', function (Blueprint $table) {  
            $table->increments('id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('orden_trabajo');
            $table->string('orden_compra');
            $table->integer('utilidad');
            $table->date('fecha_emision_cobro')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->string('num_factura');
            $table->integer('folio_cotizacion')->unsigned()->default(0);
            $table->foreign('folio_cotizacion')->references('folio')->on('cotizacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('trabajo');
    }
}
