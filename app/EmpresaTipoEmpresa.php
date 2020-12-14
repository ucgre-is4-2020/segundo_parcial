<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaTipoEmpresa extends Model
{
    protected $table = 'empresa_tipo_empresa';

      public function EmpresaTipo(){

    	return $this->belongsTo('App\EmpresaTipo','empresa_tipo_id','id');

    }

    public function Empresa(){

    	return $this->belongsTo('App\Empresa','empresa_id','id');

    }

    public function scopeBuscarpor($query, $tipo, $buscar){

   	if (($tipo)&&($buscar)) {
   		/*return EmpresaTipo::join('empresa_tipo_empresa','empresa_tipo_empresa.empresa_tipo_id','=','empresa_tipo.id')->whereRaw('UPPER(nombre) Like   \'%'.strtoupper($buscar).'%\'');*/
   		/*return DB:table('empresa_tipo_empresa')->select(DB:raw('empresa_tipo_empresa.id as modid,empresa.id as tagid, 
   			empresa.nombre'))->join('empresa',function($join){join on('empresa.id','=','empresa_tipo_empresa.empresa_id');})->where('empresa.nombre','like','%'.strtouper($buscar).'%')->get();*/

   	}

   }

}
