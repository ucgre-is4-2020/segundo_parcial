<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    public function tubo()
    {
    	return $this->belongsTo('App\Tubo', 'producto_tubo_id', 'id');
    }
}
