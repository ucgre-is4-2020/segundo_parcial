<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedidaTubo extends Model
{
    protected $table = 'unidad_medida_tubo';

    public function unidad_medida()
    {
    	return $this->belongsTo('App\UnidadMedida', 'unidad_medida_id', 'id');
    }

    public function tubo()
    {
    	return $this->belongsTo('App\Tubo', 'tubo_id', 'id');
    }
}
