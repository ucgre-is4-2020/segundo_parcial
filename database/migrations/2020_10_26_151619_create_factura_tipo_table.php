<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Agregar seeders con valores CONTADO, CREDITO, elegir un codigo
         */
        Schema::create('factura_tipo', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 40);
            $table->string('codigo', 6)->unique();

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
        Schema::dropIfExists('factura_tipo');
    }
}
