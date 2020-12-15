<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chofer_coche extends Model
{
    protected $table='chofer_coche';
    public function chofer(){
        return $this->hasOne('App\Chofer','id','chofer_id');
    }
    public function coche(){
        return $this->hasOne('App\Coche','id','coche_id');
    }    
}
