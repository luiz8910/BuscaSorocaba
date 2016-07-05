@extends('app')

@section('content')

    <div class="container">

        @if(session('nome') != null)
            <div class="alert alert-danger">
                <h5>Esta Subcategoria já existe</h5>
            </div>
            {{ session()->forget('nome') }}
        @endif



        <h3>Categoria Nome: {{ $sub->nome }}</h3>

        {!! Form::model($sub, ['route' => ['admin.subcategoria.update', $sub->id], 'class' => 'form']) !!}

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