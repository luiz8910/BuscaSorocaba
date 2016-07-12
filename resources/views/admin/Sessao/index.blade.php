@extends('app')

@section('content')

    <h3>Sessões</h3>
    <a href="{{ route('admin.sessao.create') }}" class="btn btn-default">Nova Sessão</a>

    @if(!$sala)
        {{ 'Não há dados a serem exibidos' }}

    @else

    <table class="table table-bordered table-responsive">
        <tr>
            <thead>
                <th>ID</th>
                <th>Número</th>
                <th>Horário</th>
                <th>Qualidade</th>
                <th>Shopping</th>
                <th>Audio</th>
                <th>Ação</th>
            </thead>
        </tr>

        <tbody>
            @foreach($sala as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->numero }}</td>
                    <td>{{ $s->horario }}</td>
                    <td>{{ $s->qualidade }}</td>
                    <td>{{ $s->shopping->nome }}</td>
                    <td>{{ $s->audio }}</td>
                    <td>
                        <a href="{{ route('admin.sessao.edit', [$s->id]) }}"><span class="glyphicon glyphicon-edit"></span> </a>
                        |
                        <a href="{{ route('admin.sessao.destroy', [$s->id]) }}"><span class="glyphicon glyphicon-trash"></span> </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $sala->render() !!}

    @endif
@endsection