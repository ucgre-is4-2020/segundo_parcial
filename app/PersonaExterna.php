<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaExterna extends Model
{
    protected $table = 'persona_externa';
    public function personatipo()
    {
        return $this->hasMany('App\ContactoPersonaDireccionEmpresa','persona_externa_id','id');
    }
}

