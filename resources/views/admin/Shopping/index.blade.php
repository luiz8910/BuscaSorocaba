@extends('app')

@section('content')

    <h3>Shoppings</h3>
    <a href="{{ route('admin.shoppings.create') }}" class="btn btn-default">Novo Shopping</a>

    @if(!$shopping)
        {{ 'Não há dados a serem exibidos' }}

    @else


    <table class="table table-bordered table-responsive">
        <tr>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Cinema</th>
                <th>Ação</th>
            </thead>
        </tr>

        <tbody>
            @foreach($shopping as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->nome }}</td>
                    <td>{{ $s->logradouro }}, {{ $s->numero }}</td>
                    <td>{{ $s->cinema }}</td>
                    <td>
                        <a href="{{ route('admin.shoppings.edit', [$s->id]) }}"><span class="glyphicon glyphicon-edit"></span> </a>
                        |
                        <a href="{{ route('admin.shoppings.destroy', [$s->id]) }}"><span class="glyphicon glyphicon-trash"></span> </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $shopping->render() !!}

    @endif
@endsection