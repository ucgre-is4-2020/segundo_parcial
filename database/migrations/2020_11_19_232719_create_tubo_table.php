<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tubo', function (Blueprint $table) {
            $table->id();

            $table->string('serial', 40)->unique();
            $table->string('codigo', 40)->unique();
            $table->date('fecha_compra')->nullable(true);
            $table->date('fecha_vencimiento')->nullable(true);

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
        Schema::dropIfExists('tubo');
    }
}
