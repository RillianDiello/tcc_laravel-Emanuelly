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
        <th>Sobrenome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Criado em</th>
        <th colspan="2" style="display:center;">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach($students as $student)
      @php
        $date=date('Y-m-d', $student['date']);
        @endphp
      <tr>
        <td>{{$student['id']}}</td>
        <td>{{$student['nome']}}</td>
        <td>{{$student['sobrenome']}}</td>
        <td>{{$student['email']}}</td>
        <td>{{$student['fone']}}</td>
        <td>{{$date}}</td>
        <td><a href="{{ route('students.show', $student['id'])}}" class="btn btn-success">Visualizar</a></td>
        <td><a href="{{ route('students.edit', $student['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{ route('students.destroy', $student['id'])}}" method="post">
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
