<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    //
    protected $table = 'contenido';

    public function producto()
    {
   		return $this->hasMany('App\Producto', 'tubo_id', 'id' );
    }
}
