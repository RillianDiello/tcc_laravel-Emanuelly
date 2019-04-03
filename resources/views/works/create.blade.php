@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Cadastrar novo Trabalho
  </div>
  <div class="card-body">
        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>

    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('works.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="name">Titulo:</label>
            <input type="text" class="form-control" name="titulo"/>
          </div>
          <div class="form-group">
                <label for="name">Tema:</label>
                <input type="text" class="form-control" name="tema"/>
          </div>
          <div class="form-group">
                <label for="name">Palavras Chaves:</label>
                <input type="text" class="form-control" name="palavras_chaves"/>
          </div>
          <div class="form-group">
                <label for="name">Resumo:</label>
                <textarea name="resumo" cols="149"></textarea>
          </div>
          <div class="form-group">
                <label for="name">Data de Apresentação</label>
                <input type="date" class="form-control" name="data_apresentacao"/>
          </div>
          <div class="form-group">
              <label for="name">Nome da Instituição:</label>
              <select name="instituicao_id">
                @foreach ($institutions as $institution)
                    <option value="{{ $institution->id }}">{{ $institution->nome }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="name">Nome do Curso:</label>
            <select name="curso_id">
              @foreach ($courses as $course)
                  <option value="{{ $course->id }}">{{ $course->nome }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nome do Professor:</label>
            <select name="professor_id">
              @foreach ($teachers as $teacher)
                  <option value="{{ $teacher->id }}">{{ $teacher->nome }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nome do Aluno:</label>
            <select name="aluno1_id">
              @foreach ($students as $student)
                  <option value="{{ $student->id }}">{{ $student->nome }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nome do Aluno:</label>
            <select name="aluno2_id">
              @foreach ($students as $student)
                  <option value="{{ $student->id }}">{{ $student->nome }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="name">Tipo de Trabalho:</label>
            <select name="tipo_trabalho_id">
              @foreach ($worktypes as $worktype)
                  <option value="{{ $worktype->id }}">{{ $worktype->nome_tipo }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">Insira o arquivo
            <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
