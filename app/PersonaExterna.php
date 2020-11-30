<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaExterna extends Model
{
    protected $table = 'persona_externa';

    public function contactos_personas_direcciones_empresas() {
    	return $this->hasMany('App\ContactoPersonaDireccionEmpresa', 'persona_externa_id', 'id');
    }
}
