<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tubo extends Model
{
    protected $table = 'tubo';

<<<<<<< HEAD
    public function productos()
    {
    	return $this->hasMany('App\Producto', 'producto_tubo_id', 'id');
=======
    public function unidad_medida_tubo()
    {
   		return $this->hasMany('App\UnidadMedidaTubo', 'tubo_id', 'id' );
    }

    public function producto()
    {
   		return $this->hasMany('App\Producto', 'tubo_id', 'id' );
>>>>>>> 309225a0264978c9dd9a2633970b502894ca9b3b
    }
}


