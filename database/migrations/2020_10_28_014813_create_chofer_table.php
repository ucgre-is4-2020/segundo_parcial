<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Crear un seeder que inserta 10 choferes con formatos de nombre reales en cada campo
         */
        Schema::create('chofer', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('documento_conducir', 20);
            $table->string('tipo_sangre', 3);
            $table->string('documento', 20);
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
        Schema::dropIfExists('chofer');
    }
}
