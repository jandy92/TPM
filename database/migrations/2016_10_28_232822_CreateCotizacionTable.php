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
            $table->string('folio')->primaryKey();
            $table->string('titulo');
            $table->primary('folio');
            $table->string('rut_contacto')->foreign()->references('rut')->on('contacto');
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
