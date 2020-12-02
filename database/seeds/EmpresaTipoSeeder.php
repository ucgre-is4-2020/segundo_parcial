<?php

use Illuminate\Database\Seeder;

class EmpresaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        
            DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'Coca-Cola',
                   
        ]);
		
		   DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'Pepsi',
                   
        ]);
		
		   DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'Nestle',
                   
        ]);
		
		   DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'Lactolanda',
                   
        ]);
		
		   DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'Cervepar',
                   
        ]);
		
		   DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'Doña Angela',
                   
        ]);
		
		   DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'Los Colonos',
                   
        ]);
		
		   DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'NutriHuevos',
                   
        ]);
		
		   DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'Nike',
                   
        ]);
		
		   DB::table('empresa_tipo')->insert([
                   
                    'nombre' => 'Lenovo',
                   
        ]);
        
    }
}

