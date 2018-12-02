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
        return $this->manyToMany('App\Vertex','aristas', 'id_route_origen', 'id_route_destino');
    }

    public function routes()
    {
        return $this->manyToMany('App\Vertex','aristas', 'id_route_origen', 'id_route_destino');
    }


}
