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
        <th>Criado em</th>
        <th colspan="2" style="display:center;">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach($teachers as $teacher)
      @php
        $date=date('Y-m-d', $teacher['date']);
        @endphp
      <tr>
        <td>{{$teacher['id']}}</td>
        <td>{{$teacher['nome']}}</td>
        <td>{{$teacher['identificador']}}</td>
        {{--  <td>
            <ul>
                @foreach($institution->courses as $course)
                    <li>{{ $course->nome }}</li>
                @endforeach
            </ul>
        </td>  --}}
        <td>{{$date}}</td>
        <td><a href="{{ route('teachers.show', $teacher['id'])}}" class="btn btn-success">Visualizar</a></td>
        <td><a href="{{ route('teachers.edit', $teacher['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{ route('teachers.destroy', $teacher['id'])}}" method="post">
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
