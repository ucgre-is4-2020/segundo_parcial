<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto_tipo extends Model
{
    protected $table = 'contacto_tipo';
    public function contactipo()
    {
        return $this->hasMany('App\ContactoPersonaDireccionEmpresa','contacto_tipo_id','id');
    }
}
