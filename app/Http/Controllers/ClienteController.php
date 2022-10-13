<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Cliente;
use App\Venda;
use Auth;

class ClienteController extends Controller
{   

    function telaCadastro(){
        if (Auth::check()){
            return view("telas_cadastro.cadastro_usuarios");
        }
        return view('auth.login');
    }

    function telaAlteracao($id){
        if (Auth::check()){
            $cliente = User::find($id);
            return view("telas_updates.alterar_usuario", [ "cli" => $cliente ]);
        }
        return view('auth.login');
    }

    function adicionar(Request $req){

        $req->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'senha' => ['required', 'string', 'min:8'],
        ]);

    	$nome = $req->input('nome');
    	$email = $req->input('email');
        $senha = $req->input('senha');
        $nivel = $req->input('id_usuario');

    
        $compara_email = DB::table('users')->where('email',$email)->value('email');

        if($compara_email){
            echo  "<script>alert('O email: $email ja esta em uso!');</script>";
            return view("telas_cadastro.cadastro_usuarios");
        }else{
            
            $cli = new User();
            $cli->name = $nome;
            $cli->email = $email;
            $cli->password = Hash::make($senha);
            $cli->nivel = $nivel;
            
            if ($cli->save()){
                session([
                    'mensagem' =>"Usuario: $nome, foi adicionado com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Usuario: $nome, nao foi adicionado !!!"
                ]);
            }
            return view("telas_cadastro.cadastro_usuarios");
            
        }
    }

    function alterar(Request $req, $id){
        if (Auth::check()){
            
            $cli = User::find($id);
            $nivel = $req->input('id_usuario');
            $cli->nivel = $nivel;

                if ($cli->save()){
                    session([
                        'mensagem' =>"Usuario: $cli->name, foi alterado com sucesso!"
                    ]);
                } else {
                    session([
                        'mensagem' =>"Usuario: $cli->name, nao foi alterado !!!"
                    ]);
                }
                return  ClienteController::listar();
        }
        return view('auth.login');
    }

    function excluir($id){
        if (Auth::check()){     
                
                    $user = User::find($id);
                    
                    if ($user->delete()){
                        session([
                            'mensagem' =>"Usuario: $user->name ,foi excluído com sucesso!"
                        ]);
                        return ClienteController::listar();
                    } else {
                        session([
                            'mensagem' =>"Usuario: $user->name , nao foi excluído!"
                        ]);
                        return ClienteController::listar();
                        }
        }else{
            return view('auth.login');
        }
    
    }

    function listar(){
        if (Auth::check()){
            $cliente = User::all();
            return view("listas.lista_clientes", [ "cli" => $cliente ]);
		}else{
            return view('auth.login');
        }
        
    }

}
