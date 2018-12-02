<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    public function routes(){

        return $this->belongsToMany('App\Route');
    }
    
}
