<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table = 'unidad_medida';

   public function unidad_medida_tubo()
   {
   		return $this->hasMany('App\UnidadMedidaTubo', 'unidad_medida_id', 'id' );
   }
}
