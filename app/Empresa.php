<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    public function direcciones_empresas() {
    	return $this->hasMany('App\DireccionEmpresa', 'empresa_id', 'id');
    }
}
