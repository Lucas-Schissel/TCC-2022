@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h2>
			Cadastro de Entradas
			<i class="icon-download"></i>
		</h2>
	</span>
</div>

<div class="container">
    <div class="row text-center p-5">

        <div class="col-lg-2 col-md-0 col-sm-0 col-0">
			<!-- coluna vazia esquerda -->
		</div>

        <div  class="col-lg-8 col-md-12 col-sm-12 col-12 mt-4 p-5 border border-success rounded">

			<form method="post" action="{{ route('entradas_add') }}">
			@csrf

				<select name="id_maquina" class="form-control border border-success rounded">
				<option value="" disabled selected>Escolha uma Maquina:</option>
				@foreach ($maq as $m)
				<option value="{{ $m->id}}">{{$m->nome}}</option>
				@endforeach
				</select>
				<br>
				<select name="id_evento" class="form-control border border-success rounded">
				<option value="" disabled selected>Escolha uma Evento:</option>
				@foreach ($eve as $e)
				<option value="{{ $e->id}}">{{$e->nome}}</option>
				@endforeach
				</select>
				<br>
				<select name="id_clp" class="form-control border border-success rounded">
				<option value="" disabled selected>Escolha uma CLP:</option>
				@foreach ($clp as $c)
				<option value="{{ $c->id}}">{{$c->nome}}</option>
				@endforeach
				</select>
				<br>						
				<input type="number" class="form-control border border-success rounded" name="indice" placeholder="Endereço da input">
				<div class="mt-3"></div>

				<select name="padrao" class="form-control border border-success rounded">
				<option value="" disabled selected>Valor Padrão:</option>
				<option value="true" selected>True</option>
				<option value="false">False</option>
				</select>
				<br>
				
				<select name="status" class="form-control border border-success rounded">
				<option value="" disabled selected>Status:</option>
				<option value="ativo" selected>Ativo</option>
				<option value="inativo">Inativo</option>
				</select>
				<br>	
				
				<button class="btn btn-success btn-block"  type="submit">
				Cadastrar
				<i class="icon-plus-circled"></i>
				</button>	
				
			</form>

		</div>
			
		<div class="col-lg-2 col-md-0 col-sm-0 col-0">
				<!-- coluna vazia direita -->
		</div>
	
	</div>
</div> 
	
<div class= "row">
	<span class="d-block p-2 bg-dark w-100">
	</span>
</div>

@endsection