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
        <th>Mime</th>
        <th>Telefone</th>
        <th colspan="2" style="display:center;">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach($files as $file)
      <tr>
        <td>{{$file['id']}}</td>
        <td>{{$file['filename']}}</td>
        <td>{{$file['mime']}}</td>
        <td>{{$file['size']}}</td>
        <td><a href="{{ route('files.show', $file['id'])}}" class="btn btn-success">Download</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
@endsection
