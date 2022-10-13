@extends('template')
@section('conteudo')
@if (count($alarmes) >0)  

<div class= "row">
		<span class="d-block bg-dark text-center text-white w-100">
      <h2>Todas os Alarmes:</h2>
		</span>
</div>
 
        <table class="table table-bordered table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                    <th id="celula1">ID:</th>
                    <th id="celula2">Maquina:</th>
                    <th id="celula3">Evento:</th>
                    <th id="celula4">Data:</th>
                    <th>Operaçoes:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alarmes as $a)
                <tr>
                    <td id="celula1">{{$a->id}}</td>
                    <td id="celula2">{{$a->maquina->nome}}</td>
                    <td id="celula3">{{$a->evento->nome }}</td>  
                    @if($a->updated_at)
                    <td id="celula4">{{$a->updated_at->format('d/m/Y')}}</td>
                    @else
                    <td id="celula4"></td>
                    @endif
                      
                    <td>
                        <a class="btn btn-danger m-1" href="" data-toggle="modal" data-target="#excluir"> 
                          Excluir
                          <i class="icon-trash-empty"></i>
                        </a>
                    </td>  
                </tr>
                @endforeach
            </tbody>
        </table>
        
<div class= "row">
	<div class="navbar-expand-lg navbar navbar-dark bg-dark w-100">
		<a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('menu') }}">
			<i class="icon-left-circled"></i>
			Voltar		
		</a>
	</div>
</div>


<div class="modal fade" id="excluir" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        </button>
      </div>
      <div class="modal-body">
        Deseja reconhecer o alarme?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-target="#finalizar">Nao</button>
		    <a class="btn btn-info" href="" >Sim</a>
      </div>
    </div>
  </div>
</div>
   
@else
    <div class="alert alert-danger m-2">
        <h3> Nao Existem Alarmes ativos </h3>
    </div>
@endif

@endsection