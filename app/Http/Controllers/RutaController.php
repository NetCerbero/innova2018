<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Utils\Node;
use App\Http\Controllers\Grafo;
use App\Http\Controllers\Node;
class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = new Node(1,'A',12,34,[]);
        $b = new Node(2,'B',12,34,[]);
        $c = new Node(3,'C',12,34,[]);
        $d = new Node(4,'D',12,34,[]);
        $e = new Node(5,'E',13,45,[]); 
        $f = new Node(7,'F',13,45,[]); 
        $g = new Node(8,'G',13,45,[]); 
        $h = new Node(9,'H',13,45,[]); 
        $i = new Node(12,'I',13,45,[]); 
        $j = new Node(10,'J',13,45,[]); 
        $k = new Node(11,'K',13,45,[]); 
        $l = new Node(13,'L',13,45,[]); 
        $m = new Node(14,'M',13,45,[]); 
        $n = new Node(16,'N',13,45,[]); 
        $p = new Node(17,'P',13,45,[]);


        $gr = new Grafo();
        $gr->Add($a);
        $gr->Add($b);
        $gr->Add($c);
        $gr->Add($d);
        $gr->Add($e);
        $gr->Add($f);
        $gr->Add($g);
        $gr->Add($h);
        $gr->Add($i);
        $gr->Add($j);
        $gr->Add($k);
        $gr->Add($l);
        $gr->Add($m);
        $gr->Add($n);
        $gr->Add($p);

        //      A
        $gr->AddEdge($a,8,$b);
        $gr->AddEdge($b,8,$a);
        $gr->AddEdge($a,4,$e);
        $gr->AddEdge($e,4,$a);
        $gr->AddEdge($a,5,$d);
        $gr->AddEdge($d,5,$a);
        //      B
        $gr->AddEdge($b,12,$e);
        $gr->AddEdge($e,12,$b);
        $gr->AddEdge($b,4,$f);
        $gr->AddEdge($f,4,$b);
        $gr->AddEdge($b,3,$c);
        $gr->AddEdge($c,3,$b);
        //      C
        $gr->AddEdge($c,9,$f);
        $gr->AddEdge($f,9,$c);
        $gr->AddEdge($c,11,$g);
        $gr->AddEdge($g,11,$c);
        //      F
        $gr->AddEdge($f,1,$g);
        $gr->AddEdge($g,1,$f);
        $gr->AddEdge($f,3,$e);
        $gr->AddEdge($e,3,$f);
        $gr->AddEdge($f,8,$k);
        $gr->AddEdge($k,8,$f);
        //      G
        $gr->AddEdge($g,7,$l);
        $gr->AddEdge($l,7,$g);
        $gr->AddEdge($g,8,$k);
        $gr->AddEdge($k,8,$g);
        //      E
        $gr->AddEdge($e,9,$d);
        $gr->AddEdge($d,9,$e);
        $gr->AddEdge($e,5,$j);
        $gr->AddEdge($j,5,$e);
        $gr->AddEdge($e,8,$i);
        $gr->AddEdge($i,8,$e);
        //      D
        $gr->AddEdge($d,6,$h);
        $gr->AddEdge($h,6,$d);
        //      H
        $gr->AddEdge($h,2,$i);
        $gr->AddEdge($i,2,$h);
        $gr->AddEdge($h,7,$m);
        $gr->AddEdge($m,7,$h);
        //      I
        $gr->AddEdge($i,10,$j);
        $gr->AddEdge($j,10,$i);
        $gr->AddEdge($i,6,$m);
        $gr->AddEdge($m,6,$i);
        //      M
        $gr->AddEdge($m,2,$n);
        $gr->AddEdge($n,2,$m);
        //      J
        $gr->AddEdge($j,6,$k);
        $gr->AddEdge($k,6,$j);
        $gr->AddEdge($j,9,$n);
        $gr->AddEdge($n,9,$j);
        //      K
        $gr->AddEdge($k,5,$l);
        $gr->AddEdge($l,5,$k);
        $gr->AddEdge($k,7,$p);
        $gr->AddEdge($p,7,$k);
        //      L
        $gr->AddEdge($l,6,$p);
        $gr->AddEdge($p,6,$l);
        //      N
        $gr->AddEdge($n,12,$p);
        $gr->AddEdge($p,12,$n);
        //      P

        // dd($gr);
        // return $gr->MenorDistancia([INF,INF,0,INF]);
        // return $gr->Show();
        return $gr->Disjtra($a,$p);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function show(Ruta $ruta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruta $ruta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruta $ruta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruta $ruta)
    {
        //
    }
}
