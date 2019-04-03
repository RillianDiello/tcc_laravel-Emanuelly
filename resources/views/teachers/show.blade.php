
@extends('layout')

@section('content')
  <h1>Nome: {{ $teacher->nome }}</h1>

  <div><strong>Identificador: </strong>{{ $teacher->identificador }} </div>

@endsection
