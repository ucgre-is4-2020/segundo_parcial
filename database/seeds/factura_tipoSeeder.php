<?php

use Illuminate\Database\Seeder;

class factura_tipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*
         * Agregar seeders con valores CONTADO, CREDITO, elegir un codigo
         */

        \DB::table('factura_tipo')->insert(array(
            'nombre'      => 'CONTADO',
            'codigo'      => 'cod1'

        ));
        \DB::table('factura_tipo')->insert(array(
            'nombre'      => 'CREDITO',
            'codigo'      => 'cod2'

        ));

    }
}
