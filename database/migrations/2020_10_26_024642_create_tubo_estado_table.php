<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuboEstadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         *  Crear un seeder que inserte los siguientes valores: VACIO, CARGADO, DE BAJA, DAÑADO
        */
        Schema::create('tubo_estado', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 40)->unique();
            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tubo_estado');
    }
}
