<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edge extends Model
{
    public function nodeOrigen()
    {
        return $this->belongsTo('App\Route', 'id', 'node_origen');
    }

    public function nodeDestino()
    {
        return $this->belongsTo('App\Route', 'id', 'node_destino');
    }

}
