<?php

namespace App\Http\Controllers\Api;

use App\Alarmes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlarmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alarmes = Alarmes::all();
        return response()->json([
        'alarmes' => $alarmes
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alarmes  $alarmes
     * @return \Illuminate\Http\Response
     */
    public function show(Alarmes $alarmes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alarmes  $alarmes
     * @return \Illuminate\Http\Response
     */
    public function edit(Alarmes $alarmes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alarmes  $alarmes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alarmes $alarmes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alarmes  $alarmes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alarmes $alarmes)
    {
        //
    }
}
