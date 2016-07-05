@extends('app')

@section('content')

    <h3>Responsáveis</h3>
    <a href="{{ route('admin.responsavel.create') }}" class="btn btn-default">Novo Responsável</a>

    @if(!$resp) {{ 'Não há dados para exibir' }}

    @else
    <table class="table table-bordered table-responsive">
        <tr>
            <thead>
                <th>ID</th>
                <th>Responsável</th>
                <th>Empresa</th>
                <th>Cargo</th>
                <th>Ação</th>
            </thead>
        </tr>

        <tbody>
            @foreach($resp as $r) <!-- Popula toda a table -->
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->nome }}</td>
                    <td>{{ $r->estabelecimentos->nome }}</td>
                    <td>{{ $r->cargo }}</td>
                    <td>
                        <a href="{{ route('admin.responsavel.edit', [$r->id]) }}"><span class="glyphicon glyphicon-edit"></span> </a>
                        |
                        <a href="{{ route('admin.responsavel.destroy', [$r->id]) }}"><span class="glyphicon glyphicon-trash"></span> </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {!! $resp->render() !!} <!-- Esta linha garante a paginação -->
    @endif
@endsection