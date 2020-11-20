<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Crear seeders con los siguientes valores, codigo y nombre:
         * H2O	Oxigeno
            H2	Hidrógeno
            CO2	Dióxido de Carbono
            C2H5	Etil
            Ar	Argon
         */
        Schema::create('contenido', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 40);
            $table->string('codigo', 8)->unique();
            $table->boolean('estado')->default(true);

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
        Schema::dropIfExists('contenido');
    }
}
