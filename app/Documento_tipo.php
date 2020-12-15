<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento_tipo extends Model
{
    protected $table = 'documento_tipo';

     public function empresa_documento(){

    	return $this->hasMany('App\EmpresaDocumento','documento_tipo_id','id');

    }
}
