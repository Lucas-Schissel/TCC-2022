@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2  bg-dark text-center text-white w-100">
		<h1>Alteraçao da Entrada</h1>
	</span>
</div>

<div class="mt-2 p-2">
	<form method="post" action="{{ route('entradas_alterar', ['id' => $entradas->id]) }}">
		@csrf
		<select name="id_maquina" class="form-control border border-success rounded" >
				<option value="" disabled selected >Escolha uma Maquina:</option>
				@foreach ($maq as $m)
				<option value="{{ $m->id}}" <?=($m->id == $entradas->id_maquina)?'selected':''?> >{{$m->nome}}</option>
				@endforeach
		</select>
				<br>
		<select name="id_evento" class="form-control border border-success rounded">
				<option value="" disabled selected >Escolha uma Evento:</option>
				@foreach ($eve as $e)
				<option value="{{ $e->id}}" <?=($e->id == $entradas->id_evento)?'selected':''?> >{{$e->nome}}</option>
				@endforeach
		</select>
				<br>
		<select name="id_clp" class="form-control border border-success rounded">
				<option value="" disabled selected >Escolha uma CLP:</option>
				@foreach ($clp as $c)
				<option value="{{ $c->id}}" <?=($c->id == $entradas->id_clp)?'selected':''?> >{{$c->nome}}</option>
				@endforeach
		</select>
				<br>						
				<input type="number" value="{{ $entradas->indice }}" class="form-control border border-success rounded" name="indice" placeholder="Endereço da input">
				<div class="mt-3"></div>

		<select name="padrao" class="form-control border border-success rounded">
				<option value="" disabled selected>Valor Padrão:</option>
				<option value="true" <?=('true' == $entradas->padrao)?'selected':''?> >True</option>
				<option value="false" <?=('false' == $entradas->padrao)?'selected':''?> >False</option>
		</select>

				<br>	

	<input type="submit"  class="btn btn-success btn-lg btn-block" value="Salvar alteraçoes">
	</form>
</div>

@endsection