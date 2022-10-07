@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2  bg-dark text-center text-white w-100">
		<h1>Alteraçao da Maquina</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<form method="post" action="{{ route('maquina_alterar', ['id' => $maq->id]) }}">
		@csrf
		<h4>Nome:</h4>
			<input type="text" class="form-control" name="nome"  value="{{ $maq->nome }}">
		<br>
		<h4>Descriçao:</h4>
			<input type="text" class="form-control" name="descricao"  value="{{ $maq->descricao }}">
		<br>
			<input type="submit"  class="btn btn-success btn-lg btn-block" value="Salvar alteraçoes">
	</form>
</div>

@endsection