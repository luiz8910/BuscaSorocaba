@extends('app')

@section('content')

    <div class="container">
        <h3>Nova Categoria</h3>

        {!! Form::open(['route' => 'admin.estabelecimentos.store', 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('Categoria', 'Categoria:') !!}
            {!! Form::Select('subcategorias_id', $sub, '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Categoria', 'Categoria:') !!}
            {!! Form::Select('subcategorias_id_2', $sub, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Nome:") !!}
            {!! Form::text("nome", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Telefone", "Telefone:") !!}
            {!! Form::text("telefone", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Telefone", "Telefone 2:") !!}
            {!! Form::text("telefone2", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("email", "Email:") !!}
            <input type="email" value="" name="email" class="form-control">
        </div>

        <div class="form-group">
            {!! Form::label("cep", "CEP:") !!}
            {!! Form::text("cep", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("logr", "Logradouro:") !!}
            {!! Form::text("logradouro", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("num", "Numero:") !!}
            {!! Form::text("numero", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("bairro", "Bairro:") !!}
            {!! Form::text("bairro", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("quem", "Quem Somos:") !!}
            {!! Form::textarea("quemSomos", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("servicos", "Serviços:") !!}
            {!! Form::textarea("servicos", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("site", "Site:") !!}
            <input type="url" value="" name="site" class="form-control">

        </div>

        <div class="form-group">
            {!! Form::label("24h", "24h:") !!}
            <input type="checkbox" name="24h">
        </div>

        <div class="form-group">
            {!! Form::label("Emergencia", "Emergencia:") !!}
            <input type="checkbox" name="emergencia">
        </div>

        <div class="form-group">
            {!! Form::submit("Salvar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection