<?php
/**
 * 
 */
class Node
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
/**
 * 
 */
class Grafo
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
				var_dump($i);
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
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/grafo',function(){
	$a = new Node(1,'A',12,34,[]);
	$b = new Node(2,'B',12,34,[]);
	$c = new Node(3,'C',12,34,[]);
	$d = new Node(4,'D',12,34,[]);

	$gr = new Grafo();
	$gr->Add($a);
	$gr->Add($b);
	$gr->Add($c);
	$gr->Add($d);

	$gr->AddEdge($a,15,$d);
	$gr->AddEdge($c,15,$b);
	$gr->AddEdge($c,2,$a);
	$gr->AddEdge($d,63,$a);
	$gr->AddEdge($d,50,$a);
	// dd($gr);
	return $gr->Show();
});
