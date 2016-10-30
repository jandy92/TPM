<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('item',function(BluePrint $t){
            $t->increments('id');
            $t->string('cantidad_material');
            $t->integer('precio_unitario');
            $t->string('unidad_medida_material');
            $t->integer('id_trabajo')->unsigned();
            $t->foreign('id_trabajo')->references('id')->on('trabajo')->onDelete('cascade');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('item');
    }
}
