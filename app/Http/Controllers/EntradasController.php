<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Entradas;
use App\Maquina;
use App\Alarmes;
use App\Evento;
use App\CLP;
use Auth;

class EntradasController extends Controller
{
    function telaCadastro(){
        if (Auth::check()){
            $maq = Maquina::all();
            $eve = Evento::all();
            $clp = CLP::all();
            return view('telas_cadastro.cadastro_entradas',['maq' => $maq,'eve' => $eve,'clp' => $clp]);
            }
            return view('auth.login');
    }

    function telaAlteracao($id){
        if (Auth::check()){
            $maq = Maquina::all();
            $eve = Evento::all();
            $clp = CLP::all();
            $entradas = Entradas::find($id);
            return view("telas_updates.alterar_entradas", [ "entradas" => $entradas, 'maq' => $maq,'eve' => $eve,'clp' => $clp ]);
        }
        return view('auth.login');
    }

    function adicionar(Request $req){
        if (Auth::check()){

            $req->validate([
                'id_maquina' => 'required',
                'id_evento' => 'required',
                'id_clp' => 'required',
                'indice' => 'required',
                'padrao' => 'required',
            ]);

            $maquina = $req->input('id_maquina');
            $evento = $req->input('id_evento');
            $clp = $req->input('id_clp');
            $indice = $req->input('indice');
            $padrao = $req->input('padrao');
                    
            $entradas = new Entradas();
            $entradas->id_maquina = $maquina;
            $entradas->id_evento = $evento;
            $entradas->id_clp = $clp;
            $entradas->indice = $indice;
            $entradas->padrao = $padrao;    

            if ($entradas->save()){
                session([
                    'mensagem' =>"Entrada: $indice, foi adicionado com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Entrada: $indice, nao adicionadO !!!"
                ]);
            }
            return EntradasController::telaCadastro();
        }
        return view('auth.login');
    }

    function alterar(Request $req, $id){
        if (Auth::check()){

            $req->validate([
                'id_maquina' => 'required',
                'id_evento' => 'required',
                'id_clp' => 'required',
                'indice' => 'required',
                'padrao' => 'required',
            ]);

            $entrada = Entradas::find($id);

            $maquina = $req->input('id_maquina');
            $evento = $req->input('id_evento');
            $clp = $req->input('id_clp');
            $indice = $req->input('indice');
            $padrao = $req->input('padrao');
                    
           
            $entrada->id_maquina = $maquina;
            $entrada->id_evento = $evento;
            $entrada->id_clp = $clp;
            $entrada->indice = $indice;
            $entrada->padrao = $padrao; 
            
        
            if ($entrada->save()){
                session([
                    'mensagem' =>"Entrada: $indice, foi alterada com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Entrada: $indice, nao alterada !!!"
                ]);
            }

            return EntradasController::listar();
        }
        return view('auth.login'); 
        
    }

    function listar(){
        if (Auth::check()){
            $entradas = Entradas::all();
            return view("listas.lista_entradas", [ "entradas" => $entradas ]);
            
		}else{
            return view('auth.login');
        }
    }
}
