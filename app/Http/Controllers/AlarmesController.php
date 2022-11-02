<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Alarmes;
use Auth;

class AlarmesController extends Controller
{
    function listar(){
		if (Auth::check()){
		$alarmes = Alarmes::all();
		return view('listas.lista_alarmes',['alarmes' => $alarmes]);
		}
		return view('auth.login');
	}

	
}
