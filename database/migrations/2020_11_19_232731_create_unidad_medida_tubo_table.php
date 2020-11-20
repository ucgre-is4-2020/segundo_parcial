<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadMedidaTuboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_medida_tubo', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('unidad_medida_id');
            $table->foreign('unidad_medida_id')->references('id')->on('unidad_medida');

            $table->unsignedInteger('tubo_id');
            $table->foreign('tubo_id')->references('id')->on('tubo');

            $table->double('cantidad');
            $table->string('descripcion', 200);

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
        Schema::dropIfExists('unidad_medida_tubo');
    }
}
