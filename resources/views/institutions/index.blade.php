
@section('name')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
            <a class="btn btn-xs btn-sucess" href="{{route('institutions.create')}}">Incluir nova instituição</a>
            <div>
        <div>
    <div>

        @if ($message = Session::get('sucess'))
        <div class="alert alert-sucess">
            <p>{{$message}}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th> Id </th>
                <th> Nome </th>
                <th> Identificador </th>
                <th width="300px">Opções</th>
            </tr>

            @foreach ($institutions as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->identificador}}</td>
                    <td>
                    <a class="btn btn-xs btn-info" href="{{route('instituitions.show', $item->id)}}">Vizualização</a>
                    <a class="btn btn-xs btn-primary" href="{{route('instituitions.edit', $item->id)}}">Vizualização</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['institutions.destroy', $item->id],'style' => 'display:inline'])!!}
                    {!!Form::submit('Delete', ['class'=> 'btn btn-xs btn-danget'])!!}
                    {!!Form::close()!!}
                    </td>
                        
                </tr>
            @endforeach
        </table>

        {!!$instituitions->links()!!}
@endsection