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
        $feedback = "ativo";
		$maq = Maquina::all();
        $eve = Evento::all();
        $clp = CLP::all();	
		$alarmes = Alarmes::all();
		return view('listas.lista_alarmes',['alarmes' => $alarmes , 'maq' => $maq ,'eve' => $eve ,'clp' => $clp]);
		}
		return view('auth.login');
	}

	function excluir($id){
        if (Auth::check()){     
                
                    $alarme = Alarmes::find($id);
                    
                    if ($alarme->delete()){
                        session([
                            'mensagem' =>"Alarme: $alarme->id ,foi reconhecido!"
                        ]);
                        return AlarmesController::listar();
                    } else {
                        session([
                            'mensagem' =>"Alarme: $alarme->id , não pode ser reconhecido!"
                        ]);
                        return AlarmesController::listar();
                        }
        }else{
            return view('auth.login');
        }
    
    }

	
}
