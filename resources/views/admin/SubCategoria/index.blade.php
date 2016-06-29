@extends('app')

@section('content')

    <h3>Sub Categorias</h3>
    <a href="{{ route('admin.subcategoria.create') }}" class="btn btn-default">Nova Categoria</a>

    @if(!$sub) {{ 'Não há dados para exibir' }}

    @else
    <table class="table table-bordered table-responsive">
        <tr>
            <thead>
                <th>ID</th>
                <th>Segmento</th>
                <th>Categoria</th>
                <th>Ação</th>
            </thead>
        </tr>

        <tbody>
            @foreach($sub as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->nome }}</td>
                    <td>{{ $s->categoria->nome }}</td>
                    <td>
                        <a href="{{ route('admin.subcategoria.edit', [$s->id]) }}"><span class="glyphicon glyphicon-edit"></span> </a>
                        |
                        <a href="{{ route('admin.subcategoria.destroy', [$s->id]) }}"><span class="glyphicon glyphicon-trash"></span> </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $sub->render() !!}
    @endif
@endsection