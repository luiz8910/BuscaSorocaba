@extends('app')

@section('content')

    <h3>Categorias</h3>
    <a href="{{ route('admin.categoria.create') }}" class="btn btn-default">Nova Categoria</a>

    <table class="table table-bordered table-responsive">
        <tr>
            <thead>
                <th>ID</th>
                <th>Categoria</th>
                <th>Ação</th>
            </thead>
        </tr>

        <tbody>
            @foreach($categoria as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->nome }}</td>
                    <td>
                        <a href="{{ route('admin.categoria.edit', [$c->id]) }}"><span class="glyphicon glyphicon-edit"></span> </a>

                        {{--<a href="{{ route('admin.categoria.destroy', [$c->id]) }}"><span class="glyphicon glyphicon-trash"></span> </a>--}}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $categoria->render() !!}
@endsection