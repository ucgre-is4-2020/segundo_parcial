<?php

use Illuminate\Database\Seeder;

class tabladocumentoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('documento_tipo') -> insert([
                'nombre' => 'Cedula de Identidad',
                'abreviacion'=> 'CI',
                'activo'=> true,
            ]);

            DB::table('documento_tipo') -> insert([
                'nombre' => 'Partida de Nacimiento',
                'abreviacion'=> 'NAC',
                'activo'=> true,
            ]);

            DB::table('documento_tipo') -> insert([
                'nombre' => 'Registro Unico de Contribuyente',
                'abreviacion'=> 'RUC',
                'activo'=> true,
            ]);

            DB::table('documento_tipo') -> insert([
                'nombre' => 'Pasaporte',
                'abreviacion'=> 'PAS',
                'activo'=> true,
            ]);

            DB::table('documento_tipo') -> insert([
                'nombre' => 'Licencia de Conducir',
                'abreviacion'=> 'LC',
                'activo'=> true,
            ]);

            DB::table('documento_tipo') -> insert([
                'nombre' => 'Registro Civil',
                'abreviacion'=> 'RC',
                'activo'=> true,
            ]);

            DB::table('documento_tipo') -> insert([
                'nombre' =>  'Acta de Nacimiento',
                'abreviacion'=> 'AN',
                'activo'=> true,
                
            ]);

            DB::table('documento_tipo') -> insert([
                'nombre' => 'Documento de Propiedad',
                
                'abreviacion'=>'DP',
                'activo'=> true,
            ]);

            DB::table('documento_tipo') -> insert([
                'nombre' => 'Titulo Academico',
               
                'abreviacion'=> 'TA',
                'activo'=> true,
                
            ]);

            DB::table('documento_tipo') -> insert([
                'nombre' =>  'Fe de Vida',
                'abreviacion'=> 'FV',
                'activo'=> true,
            ]);
        


    }
}
