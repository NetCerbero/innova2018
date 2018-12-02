<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Node;
class Grafo //extends Controller
{
	private $vertice;	
	function __construct()
	{
		$this->vertice = array();//[];
		$this->marcado = array();//[];
	}

	public function hello(){
		return "hola a todo";
	}

	public function Add($node){
		array_push($this->vertice, [$node,false]);
	}

	public function AddEdge($origin_node, $weight, $destination_node){
		// $sr = array_search($origin_node,array_column($this->vertice,0));
		$i = 0;
		foreach ($this->vertice as $item) {
			$nd = $item[0];
			if( $nd === $origin_node){
				// var_dump($i);
				$this->vertice[$i][0]->AddEdge($destination_node, $weight);
				return;
			}
			$i++;
		}
		// $this->vertice[$sr][0]->AddEdge($destination_node, $weight);
	}

	public function Show(){
		$e = array();
		foreach ($this->vertice as $item) {
			$nd = $item[0];
			$dato = array("id"=> $item[0]->id, "marcado"=> $item[1],"nombre"=> $nd->etiqueta, "longitud"=> $nd->latitude, "latitud"=> $nd->latitude, "aristas"=>array());
			foreach ($nd->edges as $v) {
				$dato["aristas"][] = ["id"=> $v[0]->id, "nombre"=>$v[0]->etiqueta,"latitud"=> $v[0]->latitude, "longitud" => $v[0]->latitude, "peso"=> $v[1] ];
			}
			$e[] = $dato; 
		}
		return $e;
	}

	public function Marcar($index){
		$this->vertice[$index][1] = true;
	}
	//Algoritmo disjtra
	public function IndexVertice($node){
		for($i = 0; $i < count($this->vertice) ; $i++){
			if( $this->vertice[$i][0] === $node){
				return $i;
			}
		}
		return -1;
	}

	public function EstaMarcado($nodo){
		$i = $this->IndexVertice($nodo);
		if($this->vertice[$i][1]){
			return true;
		}
		return false;
	}

	public function MenorDistancia($elementos){
		$num = INF;
		$k = 0;
		for($i=0; $i < count($elementos); $i++){
			if($elementos[$i] < $num && !$this->vertice[$i][1]){
				$num =$elementos[$i];
				$k = $i;
			}
		}
		return $k;
	}
	public function Disjtra($origen, $destino){
		//cargamos el vector de tem
		$temporal = array();
		$peso = array();
		$who = array();
		for($i=0;$i<count($this->vertice);$i++){
			if( $this->vertice[$i][0] === $origen){
				$temporal[] = 0;
				// $peso[] =  0;	
			}else{
				$temporal[] = INF;
			}
			$peso[] = null;
			$who[]  = null;
		}
		$sw = false;
		while(!$sw){
			$indice = $this->MenorDistancia($temporal);
			$peso[$indice] = $temporal[$indice];
			$this->vertice[$indice][1] = true;

			foreach ($this->vertice[$indice][0]->edges as $item) {
				if(!$this->EstaMarcado($item[0])){
					$i = $this->IndexVertice($item[0]);
					$who[$i][] = [$indice,$item[1]];
					if($temporal[$i] === INF){
						$temporal[$i] = $temporal[$indice] + $item[1];
					}else if($temporal[$i] > $temporal[$indice] + $item[1]){
						$temporal[$i] = $temporal[$indice] + $item[1];
					}                                                                                                                                
				}
			}
			if( $this->vertice[$indice][0] === $destino){
				$sw = true;
			}
		}

		// return $peso;
		//calculando la ruta
		// dd($who);
		$dest = $this->IndexVertice($destino);
		$total = $peso[$dest];
		$ruta = array();
		while ($total) {
			for($index = 0 ; $index < count($who[$dest]); $index++){
				if( $total - $who[$dest][$index][1] == $peso[$who[$dest][$index][0]]){
					$ruta[] = ["id" => $this->vertice[$dest][0]->id, "nombre"=> $this->vertice[$dest][0]->etiqueta, "latitud"=> $this->vertice[$dest][0]->latitude, "longitude"=>$this->vertice[$dest][0]->longitude];
					$total = $total - $who[$dest][$index][1];
					$dest = $who[$dest][$index][0];
					break;
				}
			}
		}
		$ruta[] = ["id" => $origen->id, "nombre"=> $origen->etiqueta, "latitud"=> $origen->latitude, "longitude"=>$origen->longitude];
		return $ruta;
	}

	public function getNearestStop($list, $my)
	{

		$lat1 = $my[0];
		$lon1 = $my[1];
		
		$shortestDistance = 10000;
		$final_bus_stop_lat = 0;
		$final_bus_stop_lng = 0;

		foreach($lista as $item)
		{	
			$lat2 = $item["lat"];
			$lon2 = $item["lon"];

			$theta = $lon1 - $lon2;
  			$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  			$dist = acos($dist);
  			$dist = rad2deg($dist);
  			$miles = $dist * 60 * 1.1515;
  			$kilometers = $miles * 1609.34;

  			if ($kilometers <= $shortestDistance) {
  				$shortestDistance = $kilometers;
  				$final_bus_stop_lat = $lat2;
  				$final_bus_stop_lng = $lon2;
  			}
		}
		$response = [$final_bus_stop_lat, $final_bus_stop_lng];
		return $response;
	}
}
