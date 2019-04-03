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

      <form method="post" action="{{ route('students.update', $student->id) }}">
        @method('PATCH')
        @csrf
          <label for="name">Nome do Estudante:</label>
          <input type="text" class="form-control" name="nome" value={{ $student->nome }} />
        </div>
        <div class="form-group">
          <label for="price">Sobrenome:</label>
          <input type="text" class="form-control" name="sobrenome" value={{ $student->sobrenome }} />
        </div>
        <div class="form-group">
            <label for="price">Email:</label>
            <input type="email" class="form-control" name="email" value={{ $student->email }} />
        </div>
        <div class="form-group">
            <label for="price">Telefone:</label>
            <input type="text" class="form-control" name="fone" value={{ $student->fone }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection

