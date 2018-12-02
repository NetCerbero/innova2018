<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    public function nodes(){

        return $this->belongsToMany('App\Line');
    }
    
}
