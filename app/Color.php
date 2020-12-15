<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table ='color';


    public function productocolor()
    {
        return $this->hasMany('App\Producto', 'Producto_id', 'id');
    }

    public function producto()
    {
    	return $this->hasMany('App\Producto', 'color_id', 'id');
    }
}
