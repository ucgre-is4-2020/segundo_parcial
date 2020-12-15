<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactoPersonaDireccionEmpresa extends Model
{
    protected $table = 'contacto_persona_direccion_empresa';
    public function persona_externa()
    {
        return $this->belongsTo('App\PersonaExterna','persona_externa_id','id');
    }
    public function direcempre()
    {
        return $this->belongsTo('App\DireccionEmpresa','direccion_empresa_id','id');
    }
    public function contactipo()
    {
        return $this->belongsTo('App\Contacto_tipo','contacto_tipo_id','id');
    }
}

