@extends('app')

@section('content')

    <h3>Sala</h3>
    <a href="{{ route('admin.sala.create') }}" class="btn btn-default">Nova Sala</a>

    @if(!$sala)
        {{ 'Não há dados a serem exibidos' }}

    @else


    <table class="table table-bordered table-responsive">
        <tr>
            <thead>
                <th>ID</th>
                <th>Número</th>
                <th>Tipo</th>
                <th>Shopping</th>
                <th>Ação</th>
            </thead>
        </tr>

        <tbody>
            @foreach($sala as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->numero }}</td>
                    <td>{{ $s->tipo }}</td>
                    <td>{{ $s->shopping->nome }}</td>
                    <td>
                        <a href="{{ route('admin.sala.edit', [$s->id]) }}"><span class="glyphicon glyphicon-edit"></span> </a>
                        |
                        <a href="{{ route('admin.sala.destroy', [$s->id]) }}"><span class="glyphicon glyphicon-trash"></span> </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $sala->render() !!}

    @endif
@endsection