@extends('app')

@section('content')

    <h3>Categorias</h3>
    <a href="{{ route('admin.categoria.create') }}" class="btn btn-default">Nova Categoria</a>

    <div class="container">
        <div class="row">
            <table class="table table-bordered table-responsive">
                <tr>
                    <thead>
                    <th>ID</th>
                    <th>Categoria</th>
                    </thead>
                </tr>

                <tbody>
                @foreach($categoria as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->nome }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            {!! $categoria->render() !!}
        </div>
    </div>

@endsection