@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Criar novo Curso
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('courses.store') }}">
          <div class="form-group">
            @csrf
            <label for="name">Instituicao</label><br>
            <select name="institution_id">
                <option value="">Selecione</option>
                @foreach ($institutions as $institution)
                    <option value="{{ $institution->id }}">{{ $institution->nome }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="name">Nome do Curso:</label>
              <input type="text" class="form-control" name="nome"/>
          </div>
          <div class="form-group">
              <label for="price">identificador :</label>
              <input type="text" class="form-control" name="identificador"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
