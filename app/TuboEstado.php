<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuboEstado extends Model
{
    protected $table = 'tubo_estado';

    public function producto()
    {
   		return $this->hasMany('App\Producto', 'tubo_id', 'id' );
    }
}
