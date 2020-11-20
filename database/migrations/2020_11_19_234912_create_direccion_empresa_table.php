<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_empresa', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresa');

            $table->unsignedInteger('barrio_id');
            $table->foreign('barrio_id')->references('id')->on('barrio');

            $table->unsignedInteger('direccion_empresa_tipo_id');
            $table->foreign('direccion_empresa_tipo_id')->references('id')->on('direccion_empresa_tipo');

            $table->string('calle', 500);
            $table->string('numero', 20);
            $table->text('latitud')->nullable();
            $table->text('longitud')->nullable();
            $table->boolean('es_casa_central');
            $table->string('nombre_ubicacion', 200);
            $table->boolean('es_deposito');

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
        Schema::dropIfExists('direccion_empresa');
    }
}
