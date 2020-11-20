<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCocheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Para el seeder, crear un seeder que inserte 50 coches - vehiculos en forma aleatoria con un formato de codigo y chapa definido por usted
        Kilometraje entre 0 y 100 mil - activo 80% de los coches*/
        Schema::create('coche', function (Blueprint $table) {
            $table->id();

            $table->string('codigo', 10)->unique();
            $table->integer('km_actual')->default(0);
            $table->boolean('activo')->default(true);
            $table->string('chapa', 12);

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
        Schema::dropIfExists('coche');
    }
}
