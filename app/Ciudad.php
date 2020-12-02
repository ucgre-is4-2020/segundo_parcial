<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';

    public function departamento(){

    	return $this->belongsTo('App\Departamentos','departamento_id', 'id');
    }

    public function barrios(){

    	return $this->hasMany('App\Barrio', 'ciudad_id', 'id');
    } 
}
