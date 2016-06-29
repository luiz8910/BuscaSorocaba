@extends('app')

@section('content')

    <div class="container">
        <h3>Categoria Nome: {{ $categoria->nome }}</h3>

        {!! Form::model($categoria, ['route' => ['admin.categoria.update', $categoria->id], 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label("Nome", "Nome:") !!}
            {!! Form::text("nome", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit("Alterar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection