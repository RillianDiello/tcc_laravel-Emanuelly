
@extends('layout')

@section('content')

  <h1>Nome: {{ $typework->nome_tipo }}</h1>

  <div><strong>Identificador: </strong>{{ $typework->identificador }} </div>

@endsection
