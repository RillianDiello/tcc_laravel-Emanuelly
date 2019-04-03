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

      @foreach($typeworks as $typework)
      @php
        $date=date('Y-m-d', $typework['date']);
        @endphp
      <tr>
        <td>{{$typework['id']}}</td>
        <td>{{$typework['nome_tipo']}}</td>
        <td>{{$typework['identificador']}}</td>
        {{--  <td>
            <ul>
                @foreach($institution->courses as $course)
                    <li>{{ $course->nome }}</li>
                @endforeach
            </ul>
        </td>  --}}
        <td>{{$date}}</td>
        <td><a href="{{ route('typesworks.show', $typework['id'])}}" class="btn btn-success">Visualizar</a></td>
        <td><a href="{{ route('typesworks.edit', $typework['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{ route('typesworks.destroy', $typework['id'])}}" method="post">
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
