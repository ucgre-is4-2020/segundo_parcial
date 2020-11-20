<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('tubo_id');
            $table->foreign('tubo_id')->references('id')->on('tubo');

            $table->unsignedInteger('contenido_id');
            $table->foreign('contenido_id')->references('id')->on('contenido');

            $table->unsignedInteger('color_id');
            $table->foreign('color_id')->references('id')->on('color');

            $table->unsignedInteger('tubo_estado_id');
            $table->foreign('tubo_estado_id')->references('id')->on('tubo_estado');

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
        Schema::dropIfExists('producto');
    }
}
