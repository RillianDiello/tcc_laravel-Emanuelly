@extends('layout')

@section('content')
<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Identificador</th>
        <th>Instituição</th>
        <th>Criado em</th>
        <th colspan="2" style="display:center;">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach($courses as $course)
      @php
        $date=date('Y-m-d', $course['date']);
        @endphp
      <tr>
        <td>{{$course['id']}}</td>
        <td>{{$course['nome']}}</td>
        <td>{{$course['identificador']}}</td>
        <td>{{$course->institution->nome}}</td>
        <td>{{$date}}</td>
        <td><a href="{{ route('courses.show', $course['id'])}}" class="btn btn-success">Visualizar</a></td>
        <td><a href="{{ route('courses.edit', $course['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{ route('courses.destroy', $course['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
@endsection
