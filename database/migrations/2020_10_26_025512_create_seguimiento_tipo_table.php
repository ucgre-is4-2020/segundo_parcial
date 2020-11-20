<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         *  Crear seeder que ingrese los registros - ENTREGA, RETIRO, REPOSICION, REPARACION
         */
        Schema::create('seguimiento_tipo', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 40);

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
        Schema::dropIfExists('seguimiento_tipo');
    }
}
