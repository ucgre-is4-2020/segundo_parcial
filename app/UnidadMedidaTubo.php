<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedidaTubo extends Model
{
    protected $table = 'unidad_medida_tubo';

    public function tubounidadid(){
    	return $this->belongsto('App\UnidadMedida', 'UnidadMedida_id','id');
    }

    public function tuboid(){
    	return $this->belongsto('App\Tubo', 'Tubo_id','id');
    }

    public function Productounidadmedida(){
    	return $this->hasMany('App\Producto', 'Producto_id','id');
    }
}
