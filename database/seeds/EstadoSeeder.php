<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tubo_estado')->insert([
        	'nombre'=> 'VACIO', 
        	'activo'=> false,
        ]);
        DB::table('tubo_estado')->insert([
        	'nombre'=> 'CARGADO', 
        	'activo'=> true,
        ]);
        DB::table('tubo_estado')->insert([
        	'nombre'=> 'DE BAJA', 
        	'activo'=> false,
        ]);
        DB::table('tubo_estado')->insert([
        	'nombre'=> 'DAÑADO', 
        	'activo'=> false,
        ]);
    }
}
