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
            $table->string('unidad_medida_material');
            $table->integer('id_tipo_material')->unsigned();

            $table->foreign('id_tipo_material')->references('id_tipo_material')->on('tipo_material')->onUpdate('cascade')->onDelete('cascade');


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
