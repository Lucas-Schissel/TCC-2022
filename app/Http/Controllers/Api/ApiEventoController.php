<?php

namespace App\Http\Controllers\Api;

use App\Evento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiEventoController extends Controller
{
    /**
     * Display a listing of the resource.
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
        
        $entradas = explode(",",$id); 
        
        if($entradas[0] == 'true'){
            $io = 1;
        }else{
            $io = 2;
        }

        return response()->json([
   
        'dados' => $entradas[0],
        'io' => $io
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
