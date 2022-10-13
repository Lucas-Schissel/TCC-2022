<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Maquina;
use App\Evento;
use App\Cliente;
use App\Alarmes;
use Auth;


class AppController extends Controller

{
	function dashboard(){
		if (Auth::check()){			
			$user = User::All();
			$usuarios = count($user);
			$maq = Maquina::All();
			$maquinas = count($maq);
			$eve = Evento::All();
			$eventos = count($eve);
			$alm = Alarmes::All();
			$alarmes = count($alm);
			return view("modal.dashboard")->with(compact('usuarios','maquinas','eventos','alarmes'));
		}
		return view('login');
	}

	function menu(){
		if (Auth::check()){			
		return view("resultado", ["mensagem" => "Bem Vindo"]);
		}
		return view('login');
	}

    function tela_login(){
		if (Auth::check()){
			return redirect()->route('menu');
		}
		return view('login');

    }

    function login(Request $req){
    	$login = $req->input('login');
		$senha = $req->input('senha');
		

		$cli = Cliente::where('login','=', $login)->first();
		
    	if ($cli and $cli->senha == $senha){

			$variaveis = ["login" => $login,"nome" => $cli->nome];
			session($variaveis);

    		return redirect()->route('menu');
    	} else {
			echo  "<script>alert('Usuário ou senha inválidos. Tente cadastrar um usuario');</script>";
            return view('tela_login');
    	}
	}

	function logout(){
		Auth::logout();
		return view('auth.login');
	}

}
