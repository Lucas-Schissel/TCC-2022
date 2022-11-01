<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Maquina;
use App\Alarmes;
use App\CLP;
use Auth;

class CLPController extends Controller
{
    function telaCadastro(){
        if (Auth::check()){
            return view('telas_cadastro.cadastro_clp');
        }
        return view('auth.login');
    }

    function telaAlteracao($id){
        if (Auth::check()){
            $clp = CLP::find($id);
            return view("telas_updates.alterar_clp", [ "clp" => $clp ]);
        }
        return view('auth.login');
    }

    function adicionar(Request $req){
        if (Auth::check()){

            $req->validate([
                'nome' => 'required|min:5',
                'ip' => 'required|min:9',
                'entradas' => 'required|min:1',
            ]);

            $nome = $req->input('nome');
            $ip = $req->input('ip');
            $entradas = $req->input('entradas');
                    
            $clp = new CLP();
            $clp->nome = $nome;
            $clp->ip = $ip;
            $clp->entradas = $entradas;       

            if ($clp->save()){
                session([
                    'mensagem' =>"CLP: $nome, foi adicionado com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"CLP: $nome, nao adicionadO !!!"
                ]);
            }
            return CLPController::telaCadastro();
        }
        return view('auth.login');
    }

    function listar(){
        if (Auth::check()){
            $clp = CLP::all();
            return view("listas.lista_clp", [ "clp" => $clp ]);
            
		}else{
            return view('auth.login');
        }
    }
}
