<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Evento;
use Auth;

class EventoController extends Controller
{
    function telaCadastro(){
        if (Auth::check()){
            return view('telas_cadastro.cadastro_eventos');
        }
        return view('auth.login');
    }

    function telaAlteracao($id){
        if (Auth::check()){
            $eve = Evento::find($id);
            return view("telas_updates.alterar_evento", [ "eve" => $eve ]);
        }
        return view('auth.login');
    }

    function adicionar(Request $req){
        if (Auth::check()){

            $req->validate([
                'nome' => 'required|min:5',
            ]);

            $nome = $req->input('nome');
                    
            $eve = new Evento();
            $eve->nome = $nome;     

            if ($eve->save()){
                session([
                    'mensagem' =>"Evento: $nome, foi adicionado com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Evento: $nome, nao adicionado !!!"
                ]);
            }
            return EventoController::telaCadastro();
        }
        return view('auth.login');
    }

    function alterar(Request $req, $id){
        if (Auth::check()){

            $req->validate([
                'nome' => 'required|min:5',
            ]);

            $eve = Evento::find($id);
            $nome = $req->input('nome');

            $eve->nome = $nome;            
        
            if ($eve->save()){
                session([
                    'mensagem' =>"Evento: $nome, foi alterado com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Evento: $nome, não alterado !!!"
                ]);
            }

            return EventoController::listar();
        }
        return view('auth.login'); 
        
    }

    function listar(){
        if (Auth::check()){
            $eve = Evento::all();
            return view("listas.lista_eventos", [ "eve" => $eve ]);
            
		}else{
            return view('auth.login');
        }
    }

    function excluir($id){
        if (Auth::check()){

            $eve =  Evento::find($id);

                if ($eve->delete()){
                    session([
                        'mensagem' =>"Evento: $eve->nome , foi excluído com sucesso!"
                    ]);
                    return EventoController::listar();
                } else {
                    session([
                        'mensagem' =>"Evento: $eve->nome , não foi excluído!"
                    ]);
                    return EventoController::listar();
                }
            
        }else{
            return view('auth.login');
        }
    }
}
