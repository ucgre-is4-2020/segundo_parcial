<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionEmpresaTipo extends Model
{
    protected $table = 'direccion_empresa_tipo';

    public function direcciones_empresas() {
    	return $this->hasMany('App\DireccionEmpresa', 'direccion_empresa_tipo_id', 'id');
    }
}
