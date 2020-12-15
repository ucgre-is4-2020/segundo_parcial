<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table = 'unidad_medida';

    public function tubounidad(){
    	return $this->hasMany('App\UnidadMedidaTubo', 'UnidadMedidaTubo_id','id');
    }

    public function tubounidadproducto(){
    	return $this->hasMany('App\Producto', 'Producto_id','id');
    }
}
