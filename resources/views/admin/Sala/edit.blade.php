@extends('app')

@section('content')

    <div class="container">

        @if(session('nome') != null)
            <div class="alert alert-danger">
                <h5>Esta Subcategoria já existe</h5>
            </div>
            {{ session()->forget('nome') }}
        @endif

        <h3>Sala numero: {{ $sala->numero }}</h3>

        {!! Form::model($sala, ['route' => ['admin.sala.update', $sala->id], 'class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label("Nome", "Shopping:") !!}
                <select required class="form-control" name="shopping_id" id="shoppingSala">
                    @foreach($shopping as $s)
                        @if($sala->shopping->id == $s->id)
                            <option selected value="{{ $s->id }}">{{ $s->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Numero:") !!}
                {!! Form::text("numero", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex:14, 18, 01', 'id' => 'numSala']) !!}
                <h6 hidden id="erroSala">Está sala já existe</h6>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Tipo:") !!}
                <select required name="tipo" class="form-control">
                    <option value="VIP">VIP</option>
                    <option value="Macro XE">Macro XE</option>
                    <option value="Convencional">Convencional</option>
                </select>
            </div>

        <div class="form-group">
            {!! Form::submit("Alterar", ['class' => 'btn btn-primary', 'disabled' => 'true', 'id' => 'botaoSala']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection