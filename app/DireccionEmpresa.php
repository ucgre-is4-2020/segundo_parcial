<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionEmpresa extends Model
{
    protected $table = 'direccion_empresa';
    public function direcctipo()
    {
        return $this->hasMany('App\ContactoPersonaDireccionEmpresa','direccion_empresa_id','id');
    }
}
