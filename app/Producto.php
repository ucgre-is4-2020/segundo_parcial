<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    public function tubo()
    {
<<<<<<< HEAD
    	return $this->belongsTo('App\Tubo', 'producto_tubo_id', 'id');
    }
=======
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

>>>>>>> 309225a0264978c9dd9a2633970b502894ca9b3b
}
