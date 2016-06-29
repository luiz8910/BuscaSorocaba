@extends('app')

@section('content')

    <div class="container">
        <h3>Nova Categoria</h3>

        {!! Form::open(['route' => 'admin.subcategoria.store', 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('Categoria', 'Categoria:') !!}
            {!! Form::Select('categoria_id', $categoria, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Nome:") !!}
            {!! Form::text("nome", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit("Salvar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection