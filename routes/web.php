<?php

use Illuminate\Support\Facades\Route;

//Rotas Publicas Aplicaçao....................................................................

Auth::routes();

//Rotas Privadas Aplicaçao....................................................................

Route::middleware(['auth'])->group(function(){

	Route::middleware(['admin'])->group(function(){

	//Usuarios................................................................................

	Route::get('/cliente/cadastro', 'ClienteController@telaCadastro')
	->name('cliente_cadastro');

	Route::get('/cliente/alterar/{id}', 'ClienteController@telaAlteracao')
	->name('cliente_update');

	Route::post('/cliente/adicionar', 'ClienteController@adicionar')
	->name('cliente_add');

	Route::post('/cliente/alterar/{id}', 'ClienteController@alterar')
	->name('cliente_alterar');

	Route::get('/cliente/excluir/{id}', 'ClienteController@excluir')
	->name('cliente_delete');

	Route::get('/cliente/listar', 'ClienteController@listar')
	->name('cliente_listar');

	//Maquinas................................................................................

	Route::get('/maquina/cadastro', 'MaquinaController@telaCadastro')
	->name('maquina_cadastro');

	Route::get('/maquina/alterar/{id}', 'MaquinaController@telaAlteracao')
	->name('maquina_update');

	Route::post('/maquina/adicionar', 'MaquinaController@adicionar')
	->name('maquina_add');

	Route::post('/maquina/alterar/{id}', 'MaquinaController@alterar')
	->name('maquina_alterar');

	Route::get('/maquina/excluir/{id}', 'MaquinaController@excluir')
	->name('maquina_delete');

	Route::get('/maquina/listar', 'MaquinaController@listar')
	->name('maquina_listar');

	Route::get('/maquina/indices/{id}', 'MaquinaController@indice')
	->name('maquina_indices');

	//Eventos................................................................................

	Route::get('/evento/cadastro', 'EventoController@telaCadastro')
	->name('evento_cadastro');

	Route::get('/evento/alterar/{id}', 'EventoController@telaAlteracao')
	->name('evento_update');

	Route::post('/evento/adicionar', 'EventoController@adicionar')
	->name('evento_add');

	Route::post('/evento/alterar/{id}', 'EventoController@alterar')
	->name('evento_alterar');

	Route::get('/evento/excluir/{id}', 'EventoController@excluir')
	->name('evento_delete');

	Route::get('/evento/listar', 'EventoController@listar')
	->name('evento_listar');

	Route::get('/eventos/listar', 'EventoController@listar')
	->name('eventos_total');

	});

	//Area restrita aplicaçao.................................................................
	Route::get('/menu', 'AppController@menu')
	->name('menu');

	Route::get('/dashboard', 'AppController@dashboard')
	->name('dashboard');

	Route::get('/logout', 'AppController@logout')
	->name('logout');

	//Usuarios..................................................................................
	Route::get('/usuario/listar', 'ClienteController@listar')
	->name('usuario_listar');
	
	//Alarmes................................................................................

	Route::get('/alarmes/listar', 'AlarmesController@listar')
	->name('alarmes_listar');

	Route::get('/alarmes/adicionar', 'AlarmesController@adicionar')
	->name('alarmes_adicionar');

	
});

Route::get('/api/inputs/{id}', 'api\ApiEventoController@inputs');
Route::get('/api/entradas', 'api\ApiEventoController@entradas');
Route::post('/api/dados', 'api\ApiEventoController@dados');






