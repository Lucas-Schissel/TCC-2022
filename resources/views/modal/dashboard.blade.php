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

<div class = "col-md-6 col-sm-6 col-6 p-1">
  <div>
        <canvas id="myChart"></canvas>
  </div>
</div>

<div class="row bg-dark text-white border border-white rounded ">
  <div>
    <br>
    <br>
  </div>
</div>

<script>
  const data = {
  labels: [
    'Usuarios',
    'Máquinas',
    'Eventos'
  ],
  datasets: [{
    label: 'Indicadores',
    data: [{{$usuarios}},{{$maquinas}},{{$eventos}}],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'doughnut',
  data: data,
};
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>


@endsection


