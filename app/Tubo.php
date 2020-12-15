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

    public function unidad_medida_tubo()
    {
   		return $this->hasMany('App\UnidadMedidaTubo', 'tubo_id', 'id' );
    }

    public function producto()
    {
   		return $this->hasMany('App\Producto', 'tubo_id', 'id' );
    }



/*QueryScope
    public function scopeSerial($query, $serial)
    {
    	if ($serial) {
    		return $query->where( 'serial', 'ilike', "%$serial%");
    	}

    }*/

    
}
