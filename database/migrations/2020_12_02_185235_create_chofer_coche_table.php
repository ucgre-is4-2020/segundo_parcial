<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferCocheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer_coche', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('chofer_id');
            $table->foreign('chofer_id')->references('id')->on('chofer');

            $table->unsignedInteger('coche_id');
            $table->foreign('coche_id')->references('id')->on('coche');

            $table->boolean('activo')->default(true);
            $table->char('dia', 1);
            $table->date('fecha_desde');
            $table->date('fecha_hasta')->nullable(true);


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
        Schema::dropIfExists('chofer_coche');
    }
}
