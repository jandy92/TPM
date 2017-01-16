<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('item', function (Blueprint $table){
            $table->increments('id_item');
            $table->string('nombre');
            $table->string('unidad_medida');
            $table->integer('id_tipo_item')->unsigned();
            $table->softDeletes();

            $table->foreign('id_tipo_item')->references('id_tipo_item')->on('tipo_item')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('item');
    }
    
}
