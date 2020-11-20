<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
   protected $table = 'departamento';

   public function scopeBuscarpor($query, $tipo, $buscar){

   	if (($tipo)&&($buscar)) {
   		return $query->whereRaw('UPPER('.$tipo.') Like   \'%'.strtoupper($buscar).'%\'');


//($tipo,"UPPER($tipo)".'Like',"%$buscar%");
   	}
   }
}
