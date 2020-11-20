<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void 
     */
    public function run()
    {
        \DB::table('color')->insert(array(
        	'id' =>'1',
        	'nombre' =>'Blanco',
        	'activo' =>true,
        	'codigo' =>'BL'
        ));
        \DB::table('color')->insert(array(
        	'id' =>'2',
        	'nombre' =>'Amarillo',
        	'activo' =>true,
        	'codigo' =>'AM'
        ));
        \DB::table('color')->insert(array(
        	'id' =>'3',
        	'nombre' =>'Rojo',
        	'activo' =>true,
        	'codigo' =>'Ro'
        ));
        \DB::table('color')->insert(array(
        	'id' =>'4',
        	'nombre' =>'Verde',
        	'activo' =>true,
        	'codigo' =>'Ve'
        ));
        \DB::table('color')->insert(array(
        	'id' =>'5',
        	'nombre' =>'Gris',
        	'activo' =>true,
        	'codigo' =>'Gr'
        ));
        \DB::table('color')->insert(array(
        	'id' =>'6',
        	'nombre' =>'Negro',
        	'activo' =>true,
        	'codigo' =>'Ne'
        ));
         \DB::table('color')->insert(array(
        	'id' =>'7',
        	'nombre' =>'Gris/Violeta',
        	'activo' =>true,
        	'codigo' =>'Gv'
        ));
          \DB::table('color')->insert(array(
        	'id' =>'8',
        	'nombre' =>'Marron',
        	'activo' =>true,
        	'codigo' =>'Ma'
        ));
    }
}
