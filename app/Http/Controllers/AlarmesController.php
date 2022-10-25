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

    function adicionar(Request $req){
		if (Auth::check()){
						
			$alm = new Alarmes();
			$alm->id_maquina = 1;
			$alm->id_evento = 3;
			

			if ($alm->save()){
				//session([
					//'mensagem' =>'Venda efetuada com Sucesso!'
				//]);
			} else {
				//session([
				//	'mensagem' =>'Venda nao efetuada!'
				//]);
			}
			return redirect('/alarmes/listar');

		}else{
            return view('auth.login');
        }

	}
}
