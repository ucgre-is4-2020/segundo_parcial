<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactoPersonaDireccionEmpresa extends Model
{
    protected $table = 'contacto_persona_direccion_empresa';

    public function medios_de_contactos() {
        return $this->hasMany('App\MedioDeContacto', 'contacto_persona_direccion_empresa_id', 'id');
    }

    public function persona_externa() {
    	return $this->belongsTo('App\PersonaExterna', 'persona_externa_id', 'id');
    }
}
