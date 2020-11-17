<?php

use Illuminate\Database\Seeder;

class ContenidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /*
         * Crear seeders con los siguientes valores, codigo y nombre:
         * H2O	Oxigeno
            H2	Hidrógeno
            CO2	Dióxido de Carbono
            C2H5	Etil
            Ar	Argon
         */

          \DB::table('contenido')->insert(array(
          	
            'nombre'    => 'Oxigeno',
            'codigo'	=> 'H20',
            'estado' 	=> true
            ));

          
          \DB::table('contenido')->insert(array(
          	
            'nombre'    => 'Hidrógeno',
            'codigo'	=> 'H2',
            'estado' 	=> true
            ));

          \DB::table('contenido')->insert(array(
          	
            'nombre'    => 'Dióxido de Carbono',
            'codigo'	=> 'CO2',
            'estado' 	=> true
            ));

          \DB::table('contenido')->insert(array(
          	
            'nombre'    => 'Etil',
            'codigo'	=> 'C2H5',
            'estado' 	=> true
            ));

          \DB::table('contenido')->insert(array(
          	
            'nombre'    => 'Argon',
            'codigo'	=> 'Ar',
            'estado' 	=> true
            ));



        
    }
}
