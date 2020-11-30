<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

     public function empresa_tipo_empresa(){

    	return $this->hasMany('App\EmpresaTipoEmpresa','empresa_id','id');

    }
    public function scopeBuscarpor($query, $tipo, $buscar){

   	if (($tipo)&&($buscar)) {
   		return $query->whereRaw('UPPER('.$tipo.') Like   \'%'.strtoupper($buscar).'%\'');


   	}
   }

}
