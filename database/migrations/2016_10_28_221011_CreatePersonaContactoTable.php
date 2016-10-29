<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('contacto', function (Blueprint $table) {  
            $table->string('rut');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email');
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
        Schema::drop('contacto');
    }
}
