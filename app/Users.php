<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['id,name,email,email_verified_at,password,remember_token,created_at,updated_at'];

    public function rolUser()
    {
        return $this->hasOne('App\RolUser');
    }

}
