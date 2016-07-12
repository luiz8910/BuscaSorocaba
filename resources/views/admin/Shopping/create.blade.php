@extends('app')

@section('content')

    <div class="container">
        <h3>Novo Shopping</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $item)
                    {{ $item }}
                @endforeach
            </div>
        @endif

        {!! Form::open(['route' => 'admin.shoppings.store', 'class' => 'form']) !!}

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
            {!! Form::submit("Salvar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection