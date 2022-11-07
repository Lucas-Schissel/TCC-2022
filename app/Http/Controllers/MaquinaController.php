<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Maquina;
use App\Alarmes;
use App\Evento;
use App\CLP;
use Auth;

class MaquinaController extends Controller
{
    function telaCadastro(){
        if (Auth::check()){
		
            return view("telas_cadastro.cadastro_maquinas");
        }
        return view('auth.login');
    }

    function telaAlteracao($id){
        if (Auth::check()){
            $maq = Maquina::find($id);
            return view("telas_updates.alterar_maquina", [ "maq" => $maq ]);
        }
        return view('auth.login');
    }

    function indice(Request $req, $id){
		if (Auth::check()){	

            $maquina = Maquina::find($id);

            $maq_alarme = DB::table('entradas')
                        ->join('eventos', 'entradas.id_evento', '=', 'eventos.id')
                        ->where('id_maquina', $id)
                        ->get();

            $alm_total = DB::table('entradas')
                        ->join('eventos', 'entradas.id_evento', '=', 'eventos.id')
                        ->where('id_maquina', $id)
                        ->count();

            //dd($maq_alarme);

            foreach($maq_alarme as $maq){
                $array_nomes_eventos[] =  "'".$maq->nome."'";
                $alm_qtd = DB::table('alarmes')
                        ->join('entradas', 'alarmes.id_entradas', '=', 'entradas.id')
                        ->where('entradas.id_evento', $maq->id)
                        ->count();
                        //dd($alm_qtd);
                $array_qtd_eventos[] =  $alm_qtd; 
            }           
                

            $maq_nome = $maquina->nome;
            $listanomes = implode(',',$array_nomes_eventos);
            $listaqtd = implode(',',$array_qtd_eventos);
            //$listaqtd = implode(',', $array_qtd_eventos);
            dd($listaqtd);
			
			return view("modal.indice")->with(compact('maq_nome','alm_total','listaqtd','listanomes'));
		}
		return view('login');
	}

    function adicionar(Request $req){
        if (Auth::check()){

            $req->validate([
                'nome' => 'required|min:5',
                'descricao' => 'required|min:5',
            ]);

            $nome = $req->input('nome');
            $descricao = $req->input('descricao');
                    
            $maq = new Maquina();
            $maq->nome = $nome;
            $maq->descricao = $descricao;       

            if ($maq->save()){
                session([
                    'mensagem' =>"Maquina: $nome, foi adicionada com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Maquina: $nome, nao adicionada !!!"
                ]);
            }
            return MaquinaController::telaCadastro();
        }
        return view('auth.login');
    }

    function alterar(Request $req, $id){
        if (Auth::check()){

            $req->validate([
                'nome' => 'required|min:5',
                'descricao' => 'required|min:5',
            ]);

            $maq = Maquina::find($id);
            $nome = $req->input('nome');
            $descricao = $req->input('descricao');

            $maq->nome = $nome;
            $maq->descricao = $descricao;
            
        
            if ($maq->save()){
                session([
                    'mensagem' =>"Maquina: $nome, foi alterada com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Maquina: $nome, nao alterada !!!"
                ]);
            }

            return MaquinaController::listar();
        }
        return view('auth.login'); 
        
    }

    function listar(){
        if (Auth::check()){
            $maq = Maquina::all();
            return view("listas.lista_maquinas", [ "maq" => $maq ]);
            
		}else{
            return view('auth.login');
        }
    }

    function excluir($id){
        if (Auth::check()){

            $maq =  Maquina::find($id);

                if ($maq->delete()){
                    session([
                        'mensagem' =>"Maquina: $maq->nome , foi excluída com sucesso!"
                    ]);
                    return MaquinaController::listar();
                } else {
                    session([
                        'mensagem' =>"Maquina: $maq->nome , nao foi excluída!"
                    ]);
                    return MaquinaController::listar();
                }
            
        }else{
            return view('auth.login');
        }
    }
}
