<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuboEstado extends Model
{
    protected $table = 'tubo_estado';


    public function productotuboestado(){
    	return $this->hasMany('App\Producto', 'Producto_id','id');
    }

    public function producto()
    {
    	return $this->hasMany('App\Producto', 'tubo_estado_id', 'id');
    }
}
