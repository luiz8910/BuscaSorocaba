@extends('app')

@section('content')

    <h3>Filmes</h3>
    <a href="{{ route('admin.filme.create') }}" class="btn btn-default">Novo Filme</a>

    @if(!$filme)
        {{ 'Não há dados a serem exibidos' }}

    @else


    <table class="table table-bordered table-responsive">
        <tr>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Duração</th>
                <th>Classificação</th>
                <th>Ação</th>
            </thead>
        </tr>

        <tbody>
            @foreach($filme as $f)
                <tr>
                    <td>{{ $f->id }}</td>
                    <td>{{ $f->nome }}</td>
                    <td>{{ $f->duracao }}
                    <td>{{ $f->classificacao }}</td>
                    <td>
                        <a href="{{ route('admin.filme.edit', [$f->id]) }}"><span class="glyphicon glyphicon-edit"></span> </a>
                        |
                        <a href="{{ route('admin.filme.destroy', [$f->id]) }}"><span class="glyphicon glyphicon-trash"></span> </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $filme->render() !!}

    @endif
@endsection