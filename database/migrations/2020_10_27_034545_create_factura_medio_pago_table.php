<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaMedioPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Crear un seeder que inserte los registros de medios de pago
         * EFECTIVO
         * CHEQUE
         * TARJETA DE CREDITO
         * TARJETA DE DEBITO
         */
        Schema::create('factura_medio_pago', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 40)->unique();
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
        Schema::dropIfExists('factura_medio_pago');
    }
}
