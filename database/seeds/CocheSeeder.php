<?php

use Illuminate\Database\Seeder;

class CocheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_ES');
        foreach (range(1, 50) as $index) {
        	DB::table('coche')->insert([
        		'codigo' => $faker->unique()->numerify('cod#######'),
        		'km_actual' => $faker->numberBetween($min = 0, $max = 100000),
        		'activo' => $faker->boolean($chanceOfGettingTrue = 80),
        		'chapa' => strtoupper($faker->unique()->lexify('????')).$faker->unique()->numerify('########')
        	]);
        }
    }
}
