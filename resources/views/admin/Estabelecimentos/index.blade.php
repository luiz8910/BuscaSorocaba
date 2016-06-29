@extends('app')

@section('content')

    <h3>Estabelecimentos</h3>
    <a href="{{ route('admin.estabelecimentos.create') }}" class="btn btn-default">Novo Estabelecimento</a>

    @if(!$estab) {{ 'Não há dados para exibir' }}

    @else
    <table class="table table-bordered table-responsive">
        <tr>
            <thead>
                <th>ID</th>
                <th>Estabelecimento</th>
                <th>Categoria</th>
                <th>Ação</th>
            </thead>
        </tr>

        <tbody>
            @foreach($estab as $e)
                <tr>
                    <td>{{ $e->id }}</td>
                    <td>{{ $e->nome }}</td>
                    <td>
                        <ul>
                            @foreach($e->subCategoria as $est)
                                <li>{{ $est->nome }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('admin.estabelecimentos.edit', [$e->id]) }}"><span class="glyphicon glyphicon-edit"></span> </a>
                        |
                        <a href="{{ route('admin.estabelecimentos.destroy', [$e->id]) }}"><span class="glyphicon glyphicon-trash"></span> </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $estab->render() !!}
    @endif
@endsection