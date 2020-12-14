<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    //
    protected $table = 'contenido';

    public function productocontenido(){
    	return $this->hasMany('App\Producto', 'Producto_id','id');
    }
}
