<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * En el seeder agregar 10 tipos de contacto que una empresa pueda tener
         * Tipo de contacto indicaria para un contacto que tengamos registrados de una
         * empresa, quien es en la misma ejemplo DUEñO, JEFE DE DEPOSITO, RECEPCIONISTA, etc
         */
        Schema::create('contacto_tipo', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 50)->unique();
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
        Schema::dropIfExists('contacto_tipo');
    }
}
