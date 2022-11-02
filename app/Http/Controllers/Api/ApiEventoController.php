<?php

namespace App\Http\Controllers\Api;

use App\Alarmes;
use App\Entradas;
use App\Evento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     * $dados = explode(",",$id);
        
       * if($dados[0] == 'true'){
        *    $io = 1;
       * }else{
       *     $io = 2;
       * }

       * return response()->json([
   
       * 'dados' => $dados[0],
       * 'io' => $io
       * ]);
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        return response()->json([
        'eventos' => $eventos
        ]);
    }

    public function inputs($id)
    {
        
        $dados = explode(",",$id);
        $tamanho = count($dados);
        $nome = "sim";

       
        
        for ($i=0; $i<$tamanho ;$i++){

            $status = "ativo";
            $alarme = "false";
            $cadastrados = DB::table('entradas')->where('indice', $i)->where('status', $status)->where('alarme', $alarme)->first();
                if($cadastrados != null){
                    if($dados[$i] != $cadastrados->padrao){
                        
                        $entradas = Entradas::find($cadastrados->id);
                        $entradas->alarme = "true"; 
                        $entradas->save();
                        $nome = "nao";        
                        $alm = new Alarmes();
			            $alm->id_entradas = $cadastrados->id;
			            $alm->save();
                    }
                }
        
        }



        return response()->json([
        'nome' => $nome,
        'tamanho' => $tamanho,    
        'dados' => $dados[0],
        ]);
    }

    public function entradas()
    {
        


        $eventos = Evento::all();
        return response()->json([
        'eventos' => $eventos
        ]);
    }

    public function dados(Request $request)
    {
        $eventos = Evento::all();
        return response()->json([
        'eventos' => $eventos
        ]);
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
        $evento = Evento::create($request->all());

        return response()->json([
        'message' => "Evento saved successfully!",
        'evento' => $evento
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();

        return response()->json([
        'message' => "Evento deleted successfully!",
        ], 200);
    }
}
