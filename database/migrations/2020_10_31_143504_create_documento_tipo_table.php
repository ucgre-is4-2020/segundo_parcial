<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Crear seeders que inserte al menos 10 tipos de documentos existentes
         * Se entiende como tipo de documento a Cedula Identidad, RUC, Pasaporte, buscar otras
         */
        Schema::create('documento_tipo', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 60);
            $table->string('abreviacion', 10)->unique();
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
        Schema::dropIfExists('documento_tipo');
    }
}
