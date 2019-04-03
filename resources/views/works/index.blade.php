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
        <th>Titulo</th>
        <th>Resumo</th>
        <th>Tema</th>
        <th>Palavras Chave</th>
        <th>Professor</th>
        <th>Alunos</th>
        <th>Tipo de Trabalho</th>
        <th>Instituicao</th>
        <th>Documento</th>
      </tr>
    </thead>
    <tbody>

      @foreach($works as $work)
      <tr>
        <td>{{ $work['id']}}</td>
        <td>{{ $work['titulo'] }}</td>
        <td>{{ $work['resumo'] }}</td>
        <td>{{ $work['tema'] }}</td>
        <td>{{ $work['palavras_chaves'] }}</td>
        <td>{{ $work->teacher->nome }}</td>
        <td>{{ $work->student1->nome }}, {{ $work->student2->nome }}</td>
        <td>{{ $work->typework->nome }}, {{ $work->typework->identificador }}</td>
        <td>{{ $work->institution->nome }} - {{ $work->institution->identificador }}</td>
        <td><a href="{{ route('files.show', $work['arquivo_id']) }}" class="btn btn-success">Download</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
@endsection
