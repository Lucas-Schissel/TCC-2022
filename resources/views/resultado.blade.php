@extends('template')
@section('conteudo')

<BR>
<BR>
<div class="text text-center" >
<h1>
<i class="icon-hand-peace-o"></i>
{{ $mensagem }}
<i class="icon-smile"></i>
</h1>
<div>
<BR>
<BR>
<h2>{{ $value = auth::user()->name}}</h2>
<BR>
<BR>
<BR>
<BR>
<div class="text text-center" >
    <h2> TCC - 2022 </h2>
<div>
@endsection
