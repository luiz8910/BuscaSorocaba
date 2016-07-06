@extends('app')

@section('content')

    <div class="container">

        @if(session('nome') != null)
            <div class="alert alert-danger">
                <h5>Este Responsável já existe</h5>
            </div>
            {{ session()->forget('nome') }}
        @endif

        <h3>Categoria Nome: {{ $resp->nome }}</h3>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($resp, ['route' => ['admin.responsavel.update', $resp->id], 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('Estabelecimento', 'Estabelecimento:') !!}
            <select name="estabelecimentos_id" id="estabelecimentos_id" class="form-control" required>
                <option value="{{ $id or ''}}">{{ $nome or 'Selecione'}}</option>
                @foreach($estab as $e)
                    @if($e->nome != $nome)
                        <option value="{{ $e->id }}">{{ $e->nome }}</option>
                    @endif
                @endforeach
            </select>
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
            {!! Form::label("email", "Email:") !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
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
            {!! Form::label("cpf", "CPF:") !!}
            {!! Form::text("cpf", null, ["class" => "form-control"]) !!}
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
            {!! Form::submit("Alterar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#subcategorias_id').change(function () {
                $('#subcategorias_id_2_div').show();
            });

            $('#subcategorias_id_2').change(function () {
                $('#subcategorias_id_3_div').show();
            });

            $('#subcategorias_id_3').change(function () {
                $('#subcategorias_id_4_div').show();
            });

            $('#subcategorias_id_4').change(function () {
                $('#subcategorias_id_5_div').show();
            });
        });

    </script>

@endsection