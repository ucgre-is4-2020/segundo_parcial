<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    public function colorid(){
    	return $this->belongsto('App\Color', 'Color_id','id');
    }

    public function tuboid(){
    	return $this->belongsto('App\Tubo', 'Tubo_id','id');
    }

    public function tuboestadoid(){
    	return $this->belongsto('App\TuboEstado', 'TuboEstado_id','id');
    }

    public function contenidoid(){
    	return $this->belongsto('App\Contenido', 'Contenido_id','id');
    }

    public function unidadmedidatuboid(){
        return $this->belongsto('App\UnidadMedidaTubo', 'UnidadMedidaTubo_id','id');
    }

    public function unidadmedidaid(){
        return $this->belongsto('App\UnidadMedida', 'UnidadMedida_id','id');
    }
      
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
