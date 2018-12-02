<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function lines(){

        return $this->belongsToMany('App\Line');
    }



    public function vertex()
    {
        return $this->hasMany('App\Vertex');
    }


    public function route()
    {
        return $this->hasMany('App\Vertex');
    }

    public function routes()
    {
        return $this->belongsToMany('App\Vertex');
    }


}
