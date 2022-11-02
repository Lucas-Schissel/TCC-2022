<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Entradas;
use App\Maquina;
use App\Alarmes;
use App\Evento;
use App\CLP;
use Auth;

class AlarmesController extends Controller
{
    function listar(){
		if (Auth::check()){
		$maq = Maquina::all();
        $eve = Evento::all();
        $clp = CLP::all();	
		$alarmes = Alarmes::all();
		return view('listas.lista_alarmes',['alarmes' => $alarmes , 'maq' => $maq ,'eve' => $eve ,'clp' => $clp]);
		}
		return view('auth.login');
	}

	
}
