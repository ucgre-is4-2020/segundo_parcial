<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

     public function empresa_tipo_empresa(){

      return $this->hasMany('App\EmpresaTipoEmpresa','empresa_id','id');

    }
   

    public function direcciones_empresas() {
      return $this->hasMany('App\DireccionEmpresa', 'empresa_id', 'id');
    } 

    public function empresa_documento() {
      return $this->hasMany('App\EmpresaDocumento', 'empresa_id', 'id');
    }



//-----------------------------------------------------------------------------

//-----------------------------------------------------------------------------

     public function scopeBuscarpor($query, $tipo, $buscar){

    if (($tipo)&&($buscar)) {
      return $query->whereRaw('UPPER('.$tipo.') Like   \'%'.strtoupper($buscar).'%\'');


    }
   }

}
