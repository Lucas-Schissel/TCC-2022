@extends('template')
@section('conteudo')

<div class="row bg-dark text-white border border-white rounded ">
  <div>
    <br>
    <br>
  </div>
</div>

<div class="row bg-dark text-white border border-white rounded ">
			<div class = "col-md-6 col-sm-6 col-6 p-1">
				Nº Usuarios:
				<span id="estrela" class="badge badge-primary badge-pill">
        {{$usuarios}}
        </span>		
			</div>
			<div class = "col-md-6 col-sm-6 col-6 p-1">
				Nº Eventos:
				<span id="estrela" class="badge badge-primary badge-pill">
        {{$eventos}}
        </span>		
			</div>
			<div class = "col-md-6 col-sm-6 col-6 p-1">
				Nº Maquinas:
				<span id="estrela" class="badge badge-primary badge-pill">
        {{$maquinas}}
        </span>	
			</div>
			<div class = "col-md-6 col-sm-6 col-6 p-1">
        Alarmes ativos: 
				<span id="estrela" class="badge badge-primary badge-pill">
        {{$alarmes}}
        </span>	
			</div>				
</div>

<div class="row bg-dark text-white border border-white rounded ">
  <div>
    <br>
    <br>
  </div>
</div>


@endsection