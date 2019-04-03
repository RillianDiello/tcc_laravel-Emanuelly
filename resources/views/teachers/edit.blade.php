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

      <form method="post" action="{{ route('teachers.update', $teacher->id) }}">
        @method('PATCH')
        @csrf
          <label for="name">Nome do Professor:</label>
          <input type="text" class="form-control" name="nome" value={{ $teacher->nome }} />
        </div>
        <div class="form-group">
          <label for="price">Identificador:</label>
          <input type="text" class="form-control" name="identificador" value={{ $teacher->identificador }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

