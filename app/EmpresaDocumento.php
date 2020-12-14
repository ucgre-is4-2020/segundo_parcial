<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaDocumento extends Model
{
    protected $table = 'empresa_documento';

    public function Empresa(){

    	return $this->belongsTo('App\Empresa','empresa_id','id');

    }

     public function Documento_tipo(){

    	return $this->belongsTo('App\Documento_tipo','documento_tipo_id','id');

    }
}
