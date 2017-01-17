<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo', function (Blueprint $table){
            $table->increments('id_trabajo');
            $table->integer('numero_factura');
            $table->date('fecha_emision_cobro')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->string('receptor_factura');
            $table->integer('orden_trabajo');
            $table->string('comentario');
            $table->integer('id_estado')->unsigned();
            $table->integer('orden_compra');
            $table->string('color');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_estado')->references('id_estado')->on('estado')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('trabajo');
    }
}
