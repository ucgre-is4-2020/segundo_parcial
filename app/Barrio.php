<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    protected $table = 'barrio';

    public function ciudad(){

    	return $this->belongsTo('App\Ciudad', 'ciudad_id', 'id');
    }
}
