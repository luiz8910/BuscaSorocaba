@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Nova Categoria</h3>

            {!! Form::open(['route' => 'admin.estabelecimentos.store', 'class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label('Categoria', 'Categoria 1:') !!}
                <select name="subcategorias_id" id="subcategorias_id" class="form-control" required>
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or ' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" hidden id="subcategorias_id_2_div">
                {!! Form::label('Categoria', 'Categoria 2:') !!}
                <select name="subcategorias_id_2" id="subcategorias_id_2" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or ' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" hidden id="subcategorias_id_3_div">
                {!! Form::label('Categoria', 'Categoria 3:') !!}
                <select name="subcategorias_id_3" id="subcategorias_id_3" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or ' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" hidden id="subcategorias_id_4_div">
                {!! Form::label('Categoria', 'Categoria 4:') !!}
                <select name="subcategorias_id_4" id="subcategorias_id_4" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or ' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" hidden id="subcategorias_id_5_div">
                {!! Form::label('Categoria', 'Categoria 5:') !!}
                <select name="subcategorias_id_5" id="subcategorias_id_5"class="form-control">
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or ' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Nome:") !!}
                {!! Form::text("nome", null, ["class" => "form-control", "id" => "nome"]) !!}
                <h6 hidden>Teste</h6>
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
                {!! Form::label("_24h", "24h") !!}
                <input type="checkbox" name="_24h">
            </div>

            <div class="form-group">
                {!! Form::label("Emergencia", "Emergencia:") !!}
                <input type="checkbox" name="emergencia">
            </div>

            <div class="form-group">
                {!! Form::submit("Salvar", ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div> <!-- Fim div Row -->

    </div> <!-- Fim div Container -->
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