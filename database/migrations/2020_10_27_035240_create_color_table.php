<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Crear un seeder que inserte los siguientes valores, todos activos
         *
         *  Blanco	BL
            Amarillo	AM
            Rojo	Ro
            Verde	Ve
            Gris	Gr
            Negro	Ne
            Gris/ Violeta	GV
            Marron	Ma
         *
         */
        Schema::create('color', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 40);
            $table->boolean('activo')->default(true);
            $table->string('codigo', 3)->unique();

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
        Schema::dropIfExists('color');
    }
}
