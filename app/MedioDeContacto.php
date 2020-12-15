<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedioDeContacto extends Model
{
    protected $table = 'medio_de_contacto';

    public function direccion_empresa() {
    	return $this->belongsTo('App\DireccionEmpresa', 'direccion_empresa_id', 'id');
    }

    public function medio_de_contacto_tipo() {
    	return $this->belongsTo('App\MedioContactoTipo', 'medio_de_contacto_tipo_id', 'id');
    }

    public function contacto_persona_direccion_empresa() {
    	return $this->belongsTo('App\ContactoPersonaDireccionEmpresa', 
                                'contacto_persona_direccion_empresa_id', 'id');
    }
}
