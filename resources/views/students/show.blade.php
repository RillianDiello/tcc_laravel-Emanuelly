
@extends('layout')

@section('content')
  <h1>Nome: {{ $student->nome }} {{ $student->sobrenome }}</h1>

  <div><strong>Email: </strong>{{ $student->email }} </div>
  <div><strong>Telefone: </strong>{{ $student->fone }} </div>

@endsection
