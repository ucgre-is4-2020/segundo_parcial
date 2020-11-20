<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoPersonaDireccionEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_persona_direccion_empresa', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('persona_externa_id');
            $table->foreign('persona_externa_id')->references('id')->on('persona_externa');

            $table->unsignedInteger('direccion_empresa_id');
            $table->foreign('direccion_empresa_id')->references('id')->on('direccion_empresa');

            $table->unsignedInteger('contacto_tipo_id');
            $table->foreign('contacto_tipo_id')->references('id')->on('contacto_tipo');

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
        Schema::dropIfExists('contacto_persona_direccion_empresa_t');
    }
}
