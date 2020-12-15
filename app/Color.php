<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table ='color';

    public function producto()
    {
    	return $this->hasMany('App\Producto', 'color_id', 'id');
    }
}
