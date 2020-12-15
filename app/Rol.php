<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id,nombre,codigo,activo,created_at,updated_at'];

    public function rolUser()
    {
        return $this->hasOne('App\RolUser');
    }

}
