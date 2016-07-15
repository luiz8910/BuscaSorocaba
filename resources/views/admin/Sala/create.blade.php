@extends('app')

@section('content')

    <div class="container">
        <h3>Nova Sala</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $item)
                    {{ $item }}
                @endforeach
            </div>
        @endif

        {!! Form::open(['route' => 'admin.sala.store', 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label("Nome", "Shopping:") !!}
            <select required class="form-control" name="shopping_id" id="shoppingSala">
                <option value="">Selecione</option>
                @foreach($shopping as $s)
                    <option value="{{ $s->id }}">{{ $s->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Nome:") !!}
            {!! Form::text("numero", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: 15, 12', 'disabled' => 'true', 'id' => 'numSala']) !!}
            <h6 hidden id="erroSala">Está sala já existe</h6>
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Tipo:") !!}
            <select required name="tipo" class="form-control">
                <option value="">Selecione</option>
                <option value="VIP">VIP</option>
                <option value="Macro XE">Macro XE</option>
                <option value="Convencional">Convencional</option>
            </select>
        </div>

        <div class="form-group">
            {!! Form::submit("Salvar", ['class' => 'btn btn-primary', 'disabled' => 'true', 'id' => 'botaoSala']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection