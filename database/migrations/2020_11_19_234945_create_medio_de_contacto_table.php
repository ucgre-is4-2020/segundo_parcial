<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedioDeContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medio_de_contacto', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('medio_de_contacto_tipo_id');
            $table->foreign('medio_de_contacto_tipo_id')->references('id')->on('medio_de_contacto_tipo');

            $table->unsignedInteger('direccion_empresa_id')->nullable();
            $table->foreign('direccion_empresa_id')->references('id')->on('direccion_empresa');

            $table->unsignedInteger('contacto_persona_direccion_empresa_id')->nullable();
            $table->foreign('contacto_persona_direccion_empresa_id')->references('id')->on('contacto_persona_direccion_empresa');

            $table->string('valor', 200);
            $table->text('observacion')->nullable();

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
        Schema::dropIfExists('medio_de_contacto');
    }
}
