<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('cliente', function (Blueprint $table) {  
            $table->string('rut');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('giro');
            $table->timestamps();
            $table->primary('rut');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('cliente');
    }
}
