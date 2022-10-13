@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2  bg-dark text-center text-white w-100">
		<h1>Alteraçao de Usuario</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<span class="d-block p-2  text-center text-black w-100">
		<h2>{{ $value = $cli->name}}</h2>
	</span>
	<form method="post" action="{{ route('cliente_alterar', ['id' => $cli->id]) }}">
		@csrf
		<br>
		<select name="id_usuario" class="form-control mt-3 border border-success rounded" >
  						<option disabled selected>Nivel de usuário</option>
  						<option value="1">Administrador</option>
  						<option value="0">Comun</option>
		</select>
		<br>
		<input type="submit" class="btn btn-success btn-lg btn-block" value="Salvar Alteraçoes">
	</form>
</div>

@endsection