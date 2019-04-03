
@extends('layout')

@section('content')
  <h1>Instituição: {{ $institution->nome }}</h1>

  <div><strong>Identificador: </strong> {{ $institution->identificador }}</div>
  <h3>Cursos da Instituição</h3>
  <ul>
      @foreach ($institution->courses as $course)
        <li>{{ $course->nome }} - {{ $course->identificador }}</li>
      @endforeach
  </ul>
@endsection
