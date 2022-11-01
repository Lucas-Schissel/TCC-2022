@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2  bg-dark text-center text-white w-100">
		<h1>Alteraçao da CLP</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<form method="post" action="{{ route('clp_alterar', ['id' => $clp->id]) }}">
		@csrf
		<h4>Nome:</h4>
			<input type="text" class="form-control" name="nome"  value="{{ $clp->nome }}">
		<br>
		<h4>IP:</h4>
			<input type="text" class="form-control" name="ip"  value="{{ $clp->ip }}">
		<br>
		<h4>Total de Inputs:</h4>
			<input type="number" class="form-control " name="entradas" value="{{ $clp->entradas }}">
		<br>	

	<input type="submit"  class="btn btn-success btn-lg btn-block" value="Salvar alteraçoes">
	</form>
</div>

@endsection