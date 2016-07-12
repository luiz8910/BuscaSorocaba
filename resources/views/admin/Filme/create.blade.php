@extends('app')

@section('content')

    <div class="container">
        <h3>Novo Filme</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $item)
                    {{ $item }}
                @endforeach
            </div>
        @endif

        {!! Form::open(['route' => 'admin.filme.store', 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label("Nome", "Nome:") !!}
            {!! Form::text("nome", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Deadpool, O Rei Leão']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Duração:") !!}
            {!! Form::text("duracao", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: 02:35']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Classifição:") !!}
            <select required class="form-control" name="classificacao">
                <option value="">Selecione</option>
                <option value="18+">18+</option>
                <option value="Livre">Livre</option>
                <option value="10 Anos">10 Anos</option>
            </select>
        </div>

        <div class="form-group">
            {!! Form::submit("Salvar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection