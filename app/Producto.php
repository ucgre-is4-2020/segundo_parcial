<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    public function tubo()
    {
    	return $this->belongsTo('App\Tubo', 'tubo_id', 'id');
    }

    public function contenido()
    {
    	return $this->belongsTo('App\Contenido', 'contenido_id', 'id');
    }

    public function color()
    {
    	return $this->belongsTo('App\Color', 'color_id', 'id');
    }

    public function tubo_estado()
    {
    	return $this->belongsTo('App\TuboEstado', 'tubo_estado_id', 'id');
    }

}
