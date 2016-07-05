@extends('app')

@section('content')

    <div class="container">

        @if(session('nome') != null)
            <div class="alert alert-danger">
                <h5>Esta Responsável já existe</h5>
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
                <option value="{{ $id[0] or ''}}">{{ $nome[0]}}</option>
                @foreach($sub as $s)
                    @if($s->nome != $nome[0])
                        <option value="{{ $s->id }}">{{ $s->nome }}</option>
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
            {!! Form::label("Telefone", "Telefone 2:") !!}
            {!! Form::text("telefone2", null, ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("email", "Email:") !!}
            <input type="email" name="email" class="form-control">
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
            <input type="url" name="site" class="form-control">
        </div>

        <div class="form-group">
            {!! Form::label("24h", "24h") !!}
            <input type="checkbox" name="_24h">
        </div>

        <div class="form-group">
            {!! Form::label("Emergencia", "Emergencia:") !!}
            <input type="checkbox" name="emergencia">
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