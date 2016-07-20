@extends('app')

@section('content')

    <div class="container">
        <h3>Nova Categoria</h3>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'admin.responsavel.store', 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('Estabelecimento', 'Estabelecimento:') !!}
            <select name="estabelecimentos_id" id="estabelecimentos_id" class="form-control" required>
                <option value="">Selecione</option>
                    @foreach($estab as $e)
                        <option value="{{ $e->id }}">{{ $e->nome }}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Nome:") !!}
            {!! Form::text("nome", null, ["class" => "form-control", "id" => "nome"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Telefone", "Telefone:") !!}
            {!! Form::text("telefone", null, ["class" => "form-control numero"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("email", "Email:") !!}
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            {!! Form::label("cep", "CEP:") !!}
            {!! Form::text("cep", null, ["class" => "form-control numero"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("logr", "Logradouro:") !!}
            {!! Form::text("logradouro", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("num", "Numero:") !!}
            {!! Form::text("numero", null, ["class" => "form-control numero"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("bairro", "Bairro:") !!}
            {!! Form::text("bairro", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("cpf", "CPF::") !!}
            {!! Form::text("cpf", null, ["class" => "form-control numero"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("rg", "RG:") !!}
            {!! Form::text("rg", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("cargo", "Cargo:") !!}
            {!! Form::text("cargo", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit("Salvar", ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('admin.responsavel.index') }}" class="btn btn-default">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            $('.numero').bind('keypress', function (event) {
                var regex = new RegExp("^[0-9]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });
        });

    </script>
@endsection