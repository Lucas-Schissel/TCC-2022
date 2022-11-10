@extends('template')
@section('conteudo')
@if (count($alarmes) >0)  

<div class= "row">
		<span class="d-block bg-dark text-center text-white w-100">
      <h2>Todos os Alarmes:</h2>
		</span>
</div>
 
        <table class="table table-bordered table-hover mt-2">
            <thead class="thead-dark">
                <tr>
                    <th id="celula1">ID:</th>
                    <th >Maquina:</th>
                    <th >Evento:</th>
                    <th >Data/Hora:</th>
                    <th>Operaçoes:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alarmes as $a)
                <tr>
                    <td id="celula1">{{$a->id}}</td>
                    <td >{{$a->entradas->maquina->nome}}</td>
                    <td >{{$a->entradas->evento->nome }}</td>  
                    @if($a->updated_at)
                    <td >{{$a->updated_at}}</td>
                    @else
                    <td id="celula4"></td>
                    @endif
                      
                    <td>
                        <a class="delete btn btn-danger m-1" data-nome="{{ $a->id}}" data-id="{{ $a->id}}"> 
                         
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
		Deseja reconhecer o alarme, <span class="nome"></span>?
        
      </div>
      <div class="modal-footer justify-content-center">
		<a href="#" type="button" class="btn btn-outline-secondary delete-yes">Sim</a>
		<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>

<script>
	$('.delete').on('click', function(){
		var nome = $(this).data('nome');
		var id = $(this).data('id'); 
		$('span.nome').text(nome); 
		$('a.delete-yes').attr('href', '/alarme/excluir/' +id); 
		$('#excluir').modal('show');
	});
</script>
   
@else
    <div class="alert alert-danger m-2">
        <h3> Nao Existem Alarmes ativos </h3>
    </div>
@endif

@endsection