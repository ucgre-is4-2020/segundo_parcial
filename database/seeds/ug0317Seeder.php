<?php

use Illuminate\Database\Seeder;

class ug0317Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('es_ES');
		\DB::table('seguimiento_tipo')->insert(array(
			'nombre' => 'ENTREGA',
		)); 
		
		\DB::table('seguimiento_tipo')->insert(array(
			'nombre' => 'RETIRO',
		));

		\DB::table('seguimiento_tipo')->insert(array(
			'nombre' => 'REPOSICION',
		));
		\DB::table('seguimiento_tipo')->insert(array(
			'nombre' => 'REPARACION',
		));

    }
}
