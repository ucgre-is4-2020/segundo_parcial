<?php

use Illuminate\Database\Seeder;

class cargarDepartamento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('departamento')->insert(array(
                    'nombre' => 'Concepción',
                    'abreviacion' =>'Concep'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'San Pedro',
                    'abreviacion' =>'San Pd'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Cordillera',
                    'abreviacion' =>'Cord'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Guairá',
                    'abreviacion' =>'Gra'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Caaguazú',
                    'abreviacion' =>'Caag'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Caazapá',
                    'abreviacion' =>'Caaz'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Itapúa',
                    'abreviacion' =>'Itp'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Misiones',
                    'abreviacion' =>'Mis'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Paraguarí',
                    'abreviacion' =>'Par'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Alto Paraná',
                    'abreviacion' =>'A Parana'
        )
        );
          DB::table('departamento')->insert(array(
                    'nombre' => 'Central',
                    'abreviacion' =>'Cen'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Ñeembucú',
                    'abreviacion' =>'Ñmb'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Amambay',
                    'abreviacion' =>'Amb'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Canindeyú',
                    'abreviacion' =>'Cand'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Presidente hayes',
                    'abreviacion' =>'Pdte Hs'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Boquerón',
                    'abreviacion' =>'Boqu'
        )
        );
         DB::table('departamento')->insert(array(
                    'nombre' => 'Alto Paraguay',
                    'abreviacion' =>'Alto P'
        )
        );
    }
}
