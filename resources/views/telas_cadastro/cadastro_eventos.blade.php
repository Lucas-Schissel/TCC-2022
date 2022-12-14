@extends('template')
@section('conteudo')

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h2>
			Cadastro de Eventos
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

			<form method="post" action="{{ route('evento_add') }}">
			@csrf
				
				<input type="text" class="form-control border border-success rounded" name="nome" placeholder="Nome">
				<div class="mt-3"></div>
				
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