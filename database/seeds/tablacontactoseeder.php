<?php

use Illuminate\Database\Seeder;

class tablacontactoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacto_tipo') -> insert([
            'nombre' => 'Dueño',
            'activo'=> true,
        ]);

        DB::table('contacto_tipo') -> insert([
            'nombre' => 'Jefe',
            'activo'=> true,
        ]);

        DB::table('contacto_tipo') -> insert([
            'nombre' => 'Gerente',
            'activo'=> true,
        ]);
        DB::table('contacto_tipo') -> insert([
            'nombre' => 'Secretaria',
            'activo'=> true,
        ]);
        DB::table('contacto_tipo') -> insert([
            'nombre' => 'Recepcionista',
            'activo'=> true,
        ]);
        DB::table('contacto_tipo') -> insert([
            'nombre' => 'Encargado de Deposito',
            'activo'=> true,
        ]);
        DB::table('contacto_tipo') -> insert([
            'nombre' => 'Proveedor',
            'activo'=> true,
        ]);
        DB::table('contacto_tipo') -> insert([
            'nombre' => 'Contador',
            'activo'=> true,
        ]);
        DB::table('contacto_tipo') -> insert([
            'nombre' => 'Jefe de Produccion',
            'activo'=> true,
        ]);
        DB::table('contacto_tipo') -> insert([
            'nombre' => 'RRHH',
            'activo'=> true,
        ]);
    }
}
