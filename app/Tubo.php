<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tubo extends Model
{
    protected $table = 'tubo';

    public function productos()
    {
    	return $this->hasMany('App\Producto', 'producto_tubo_id', 'id');
    }
}


