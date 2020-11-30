<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedioContactoTipo extends Model
{
    protected $table = 'medio_de_contacto_tipo';

    public function medios_de_contactos() {
        return $this->hasMany('App\MedioDeContacto', 'medio_de_contacto_tipo_id', 'id');
    }
}
