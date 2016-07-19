@extends('app')

@section('content')

    <div class="container">

        <h3>Categoria Nome: {{ $estab->nome }}</h3>

        {!! Form::model($estab, ['route' => ['admin.estabelecimentos.update', $estab->id], 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('Categoria', 'Categoria 1:') !!}
            <select name="subcategorias_id" id="subcategorias_id" class="form-control" required>
                <option value="{{ $id[0] or ''}}">{{ $nome[0]}}</option>
                @if($sub != null)
                    @foreach($sub as $s)
                        @if($s->nome != $nome[0])
                            <option value="{{ $s->id }}">{{ $s->nome }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group" id="subcategorias_id_2_div">
            {!! Form::label('Categoria', 'Categoria 2:') !!}
            <select name="subcategorias_id_2" id="subcategorias_id_2" class="form-control">
                <option value="{{ $id[1] or $id[1] = ''}}">{{ $nome[1] or $nome[1] = 'Selecione'}}</option>
                @if($sub != null)
                    @foreach($sub as $s)
                        @if($s->nome != $nome[1])
                            <option value="{{ $s->id }}">{{ $s->nome }}</option>
                        @endif
                    @endforeach

                    @if($id[1])<option value="">Selecione</option> @endif
                @endif
            </select>
        </div>

        <div class="form-group" id="subcategorias_id_3_div">
            {!! Form::label('Categoria', 'Categoria 3:') !!}
            <select name="subcategorias_id_3" id="subcategorias_id_3" class="form-control">
                <option value="{{ $id[2] or $id[2] = ''}}">{{ $nome[2] or $nome[2] = 'Selecione'}}</option>
                @if($sub != null)
                    @foreach($sub as $s)
                        @if($s->nome != $nome[2])
                            <option value="{{ $s->id }}">{{ $s->nome }}</option>
                        @endif
                    @endforeach

                    @if($id[2])<option value="">Selecione</option> @endif
                @endif
            </select>
        </div>

        <div class="form-group" id="subcategorias_id_4_div">
            {!! Form::label('Categoria', 'Categoria 4:') !!}
            <select name="subcategorias_id_4" id="subcategorias_id_4" class="form-control">
                <option value="{{ $id[3] or $id[3] = ''}}">{{ $nome[3] or $nome[3] = 'Selecione'}}</option>
                @if($sub != null)
                    @foreach($sub as $s)
                        @if($s->nome != $nome[3])
                            <option value="{{ $s->id }}">{{ $s->nome }}</option>
                        @endif
                    @endforeach

                    @if(is_null($id[3]))<option value="">Selecione</option> @endif
                @endif
            </select>
        </div>

        <div class="form-group" id="subcategorias_id_5_div">
            {!! Form::label('Categoria', 'Categoria 5:') !!}
            <select name="subcategorias_id_5" id="subcategorias_id_5" class="form-control">
                <option value="{{ $id[4] or $id[4] = ''}}">{{ $nome[4] or $nome[4] = 'Selecione'}}</option>
                @if($sub != null)
                    @foreach($sub as $s)
                        @if($s->nome != $nome[4])
                            <option value="{{ $s->id }}">{{ $s->nome }}</option>
                        @endif
                    @endforeach

                    @if($id[4])<option value="">Selecione</option> @endif
                @endif
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
            <input type="email" value="{{ $estab->email }}" name="email" class="form-control">
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
            @if($estab->_24h == 'on')
                <input type="checkbox" checked name="_24h">
            @else
                <input type="checkbox" name="_24h">
            @endif

        </div>

        <div class="form-group">
            {!! Form::label("Emergencia", "Emergencia:") !!}
            @if($estab->_24h == 'on')
                <input type="checkbox" checked name="emergencia">
            @else
                <input type="checkbox" name="emergencia">
            @endif
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