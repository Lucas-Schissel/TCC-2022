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
				Nome:
				<span id="estrela" class="badge badge-primary badge-pill">
        {{$maq_nome}}
        </span>		
			</div>
      <div class = "col-md-6 col-sm-6 col-6 p-1">
				Total Eventos:
				<span id="estrela" class="badge badge-primary badge-pill">
        {{$alm_total}}
        </span>		
			</div>
			
</div>

<div class = "col-md-6 col-sm-6 col-6 p-1">
  <div>
        <canvas id="myChart"></canvas>
  </div>
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
  labels: [{!!$listanomes!!}],
  datasets: [{
    label: 'My First Dataset',
    data: [{{$listaqtd}}],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(245, 236, 66)'
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


