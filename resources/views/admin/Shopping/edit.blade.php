@extends('app')

@section('content')

    <div class="container">

        @if(session('nome') != null)
            <div class="alert alert-danger">
                <h5>Esta Subcategoria já existe</h5>
            </div>
            {{ session()->forget('nome') }}
        @endif

        <h3>Categoria Nome: {{ $shopping->nome }}</h3>

        {!! Form::model($shopping, ['route' => ['admin.shoppings.update', $shopping->id], 'class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label("Nome", "Nome:") !!}
                {!! Form::text("nome", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Shopping das Capivaras']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Produtor:") !!}
                {!! Form::text("cinema", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Cine Araújo, Cinépolis']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "CEP:") !!}
                {!! Form::text("cep", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: 18113400']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Logradouro:") !!}
                {!! Form::text("logradouro", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Avenida João da Silva']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Numero:") !!}
                {!! Form::text("numero", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: 999']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Bairro:") !!}
                {!! Form::text("bairro", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Pq. Campolim']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Informações:") !!}
                {!! Form::textarea("info", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Informe aqui os valores e outros detalhes do cinema']) !!}
            </div>

        <div class="form-group">
            {!! Form::submit("Alterar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection