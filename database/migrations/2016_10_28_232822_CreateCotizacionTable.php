<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('cotizacion', function (Blueprint $table) {  
            $table->increments('folio');
            $table->string('titulo');
            $table->string('rut_contacto')->foreign()->references('rut')->on('contacto')->onDelete('cascade');
            $table->string('rut_cliente')->foreign()->references('rut')->on('cliente')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('cotizacion');
    }
}
