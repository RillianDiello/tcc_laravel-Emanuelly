
@extends('layout')

@section('content')
  <h1>Curso: {{ $course->institution->nome }}</h1>
  <h2>{{  $course->nome }}</h2>
  <div><strong>Name: </strong> {{ $course->nome }}</div>
  <div><strong>Identificador: </strong> {{ $course->identificador }}</div>

@endsection
