@extends('app')

@section('content')

    <div class="container">

        @if(session('nome') != null)
            <div class="alert alert-danger">
                <h5>Esta Subcategoria já existe</h5>
            </div>
            {{ session()->forget('nome') }}
        @endif

        <h3>Nome: {{ $filme->nome }}</h3>

        {!! Form::model($filme, ['route' => ['admin.filme.update', $filme->id], 'class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label("Nome", "Nome:") !!}
                {!! Form::text("nome", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Deadpool, O Rei Leão']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Duração:") !!}
                {!! Form::text("duracao", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: 02:35']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Classificação:") !!}
                <select required class="form-control" name="classificacao">
                    @if($filme->classificacao == '18+')<option value="18+" selected>18+</option>@else<option value="18+">18+</option>@endif
                    @if($filme->classificacao == 'Livre')<option value="Livre" selected>Livre</option>@else<option value="Livre">Livre</option>@endif
                    @if($filme->classificacao == '10 Anos')<option value="10 Anos" selected>10 Anos</option>@else<option value="10 Anos">10 Anos</option>@endif
                </select>
            </div>

        <div class="form-group">
            {!! Form::submit("Alterar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection