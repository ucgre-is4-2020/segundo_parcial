<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Crear seeder con todos los departamentos del PY reales - agregar una abreviacion individual a cada uno*/
        Schema::create('departamento', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 40)->unique();
            $table->string('abreviacion', 10)->unique();

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
        Schema::dropIfExists('departamento');
    }
}
