@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2  bg-dark text-center text-white w-100">
		<h1>Alteraçao de Evento</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<form method="post" action="{{ route('evento_alterar', ['id' => $eve->id]) }}">
		@csrf
		<h4>Nome:</h4>
			<input type="text" class="form-control" name="nome"  value="{{ $eve->nome }}">
		<br>
			<input type="submit"  class="btn btn-success btn-lg btn-block" value="Salvar alteraçoes">
	</form>
</div>

@endsection