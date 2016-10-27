<html>
<head>
    @include('admin.include.head')
</head>

<body>

<header>
    @include('admin.include.header')
</header>

<div id="wrapper">

    @include('admin.include.menu-lateral')

    <div class="container espacamento">
        <div class="row">

            <h3>Categoria Nome: {{ $estab->nome }}</h3>

            {!! Form::model($estab, ['id' => 'alterarEstab', 'class' => 'form', 'method' => 'get']) !!}

            <input value="{{ $estab->id }}" id="id" hidden>

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

                        @if($id[1])
                            <option value="">Selecione</option> @endif
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

                        @if($id[2])
                            <option value="">Selecione</option> @endif
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

                        @if(is_null($id[3]))
                            <option value="">Selecione</option> @endif
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

                        @if($id[4])
                            <option value="">Selecione</option> @endif
                    @endif
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Nome:") !!}
                {!! Form::text("nome", null, ["class" => "form-control", 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Telefone", "Telefone:") !!}
                {!! Form::text("telefone", null, ["class" => "form-control numero"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Telefone", "Telefone 2:") !!}
                {!! Form::text("telefone2", null, ["class" => "form-control numero"]) !!}
            </div>

            <div class="form-group">
                {!! Form::label("email", "Email:") !!}
                <input type="email" value="{{ $estab->email }}" name="email" class="form-control">
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
                {!! Form::label("complemento", "Complemento:") !!}
                {!! Form::text("complemento", null, ["class" => "form-control"]) !!}
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
                {!! Form::text("site", null, ["class" => "form-control", 'id' => 'site']) !!}
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
                @if($estab->emergencia == 'on')
                    <input type="checkbox" checked name="emergencia">
                @else
                    <input type="checkbox" name="emergencia">
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" href="#" data-loading-text='Enviando ......'>Alterar
                </button>
                <a class="btn btn-default" href="{{ route('admin.estabelecimentos.index') }}">Voltar</a>
            </div>

            {!! Form::close() !!}

            <div hidden id="dialog-message" title="Erro">
                <p>
                    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                    Este Estabelecimento já está Cadastrado, Tente Novamente.
                </p>
            </div>

            <div hidden id="siteDialog" title="Erro">
                <p>
                    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                    Site Incorreto, use Http ou Https
                </p>
            </div>

        </div>
    </div>
</body>
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

            $('.numero').bind('keypress', function (event) {
                var regex = new RegExp("^[0-9]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });

            $('#site').bind('blur', function (event) {
                var urlPattern = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;

                var input = $('#site').val();

                if (!urlPattern.test(input)) {
                    $("#siteDialog").dialog({
                        modal: true,
                        buttons: {
                            Ok: function () {
                                $(this).dialog("close");
                            }
                        }
                    });
                    event.preventDefault();
                    return false;
                }
            });

            $('#alterarEstab').submit(function () {
                var id = $('#id').val();
                var data = $(this).serialize();

                var request = $.ajax({
                    method: 'GET',
                    url: '/estabelecimentos/alterar/' + id,
                    data: data,
                    dataType: 'json'
                });

                request.done(function (e) {
                    console.log('done');
                    console.log(e);

                    if (e.status == false) {
                        console.log(e.status);
                        $("#dialog-message").dialog({
                            modal: true,
                            buttons: {
                                Ok: function () {
                                    $(this).dialog("close");
                                }
                            }
                        });
                    }
                    else {
                        window.location = '/estabelecimentos';
                    }
                });

                request.fail(function (e) {
                    console.log('fail');
                    console.log(e);
                });

                return false;
            });
        });

    </script>

@endsection
</html>