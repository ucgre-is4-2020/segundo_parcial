<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tubo extends Model
{
    protected $table = 'tubo';

    public function productotubo(){
    	return $this->hasMany('App\Producto', 'Producto_id','id');
    }

    public function tubounidadmedida(){
    	return $this->hasMany('App\UnidadMedidaTubo', 'UnidadMedidaTubo_id','id');
    }
}
