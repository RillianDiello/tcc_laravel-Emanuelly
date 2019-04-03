@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
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

      <form method="post" action="{{ route('institutions.update', $institution->id) }}">
        @method('PATCH')
        @csrf
          <label for="name">Nome do Curso</label>
          <input type="text" class="form-control" name="nome" value={{ $institution->nome }} />
        </div>
        <div class="form-group">
          <label for="price">Identificador do Curso:</label>
          <input type="text" class="form-control" name="identificador" value={{ $institution->identificador }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

