<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Node //extends Controller
{
	public $edges;
	public $latitude;
	public $longitude;
	public $etiqueta;
	public $id;
	// private $weight;
	function __construct($id, $name, $latitude, $longitude, $edges)
	{	
		$this->id = $id;
		$this->etiqueta = $name;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		$this->edges = $edges;
	}

	public function AddEdge($node, $weight){
		// $this->edges[] = [$node, $weight];
		array_push($this->edges, array($node, $weight));
	}

	public function RemoveEdge($node){
		// if(!count($this->edges)){
		// 	$nd = array_search($node, $this->edges)
		// 	echo "si se puede eliminar";
		// }else{
		// 	echo "no se puede eliminar";
		// }
	}

	public function Show(){
		// $f = ["as"=>1,"asf"=>"asdasd"];
		// var_dump($this);
		// return json_encode($this);
	}
}