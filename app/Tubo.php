<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tubo extends Model
{
    protected $table = 'tubo';

    public function unidad_medida_tubo()
    {
   		return $this->hasMany('App\UnidadMedidaTubo', 'tubo_id', 'id' );
    }

    public function producto()
    {
   		return $this->hasMany('App\Producto', 'tubo_id', 'id' );
    }
}


