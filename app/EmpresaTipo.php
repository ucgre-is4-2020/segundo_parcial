<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaTipo extends Model
{
    protected $table = 'empresa_tipo';

    public function empresa_tipo_empresa(){

    	return $this->hasMany('App\EmpresaTipoEmpresa','empresa_tipo_id','id');

    }
}
