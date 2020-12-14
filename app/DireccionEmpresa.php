<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionEmpresa extends Model
{
    protected $table = 'direccion_empresa';

    public function medios_de_contactos() {
        return $this->hasMany('App\MedioDeContacto', 'direccion_empresa_id', 'id');
    }

    public function direccion_empresa_tipo() {
    	return $this->belongsTo('App\DireccionEmpresaTipo', 'direccion_empresa_tipo_id', 'id');
    }

    public function barrio() {
    	return $this->belongsTo('App\Barrio', 'barrio_id', 'id');
    }

    public function empresa() {
    	return $this->belongsTo('App\Empresa', 'empresa_id', 'id');
    }
}
