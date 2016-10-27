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
            <h3>Nova Categoria</h3>

            {!! Form::open(['id' => 'cadastrarEstab', 'class' => 'form', 'method' => 'get']) !!}

            <div class="form-group">
                {!! Form::label('Categoria', 'Categoria 1:') !!}
                <select name="subcategorias_id" id="subcategorias_id" class="form-control" required>
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or '' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" hidden id="subcategorias_id_2_div">
                {!! Form::label('Categoria', 'Categoria 2:') !!}
                <select name="subcategorias_id_2" id="subcategorias_id_2" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or '' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" hidden id="subcategorias_id_3_div">
                {!! Form::label('Categoria', 'Categoria 3:') !!}
                <select name="subcategorias_id_3" id="subcategorias_id_3" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or '' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" hidden id="subcategorias_id_4_div">
                {!! Form::label('Categoria', 'Categoria 4:') !!}
                <select name="subcategorias_id_4" id="subcategorias_id_4" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or '' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" hidden id="subcategorias_id_5_div">
                {!! Form::label('Categoria', 'Categoria 5:') !!}
                <select name="subcategorias_id_5" id="subcategorias_id_5" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($sub as $s)
                        <option value="{{ $s->id or '' }}">{{ $s->nome or '' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Nome:") !!}
                {!! Form::text("nome", null, ["class" => "form-control", "id" => "nome", 'required' => 'required']) !!}
                <h6 hidden>Teste</h6>
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
                {!! Form::label("_24h", "24h") !!}
                <input type="checkbox" name="_24h">
            </div>

            <div class="form-group">
                {!! Form::label("Emergencia", "Emergencia:") !!}
                <input type="checkbox" name="emergencia">
            </div>

            <div class="form-group">
                <button type="submit" id="btnSalvar" class="btn btn-primary" href="#">Salvar</button>
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

        </div> <!-- Fim div Row -->

    </div> <!-- Fim div Container -->
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


            $('#cadastrarEstab').submit(function () {
                $('#btnSalvar').html('Enviando...');
                var data = $(this).serialize();

                var request = $.ajax({
                    method: 'GET',
                    url: '/estabelecimentos/salvar',
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
                                    $('#btnSalvar').html('Salvar');
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