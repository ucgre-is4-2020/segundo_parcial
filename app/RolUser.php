<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    protected $table = 'roles_users';
    protected $fillable = ['id,user_id,rol_id,activo,created_at,updated_at'];

    public function rol()
    {
        return $this->belongsTo('App\Rol');

    }

    public function users()
    {
        return $this->belongsTo('App\Users','user_id','id');

    }
   
}