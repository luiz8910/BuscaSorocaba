<!DOCTYPE html>
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
                <h3>Categoria Nome: {{ $sub->nome }}</h3>

                {!! Form::model($sub, ['id' => 'alterarCat', 'class' => 'form']) !!}

                <input type="text" hidden id="id" value="{{ $sub->id }}">

                <div class="form-group">
                    {!! Form::label('Categoria', 'Categoria:') !!}
                    {!! Form::Select('categoria_id', $categoria, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("Nome", "Nome:") !!}
                    {!! Form::text("nome", null, ["class" => "form-control"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("24h", "24h") !!}
                    @if($sub->_24h == 'on')
                        <input type="checkbox" checked name="_24h">
                    @else
                        <input type="checkbox" name="_24h">
                    @endif

                </div>

                <div class="form-group">
                    {!! Form::label("Emergencia", "Emergencia:") !!}
                    @if($sub->emergencia == 'on')
                        <input type="checkbox" checked name="emergencia">
                    @else
                        <input type="checkbox" name="emergencia">
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" id="btnAlterar" class="btn btn-primary" href="#" value=''>Alterar</button>
                    <a class="btn btn-default" href="{{ route('admin.subcategoria.index') }}">Voltar</a>
                </div>

                {!! Form::close() !!}

                <div hidden id="dialog-message" title="Erro">
                    <p>
                        <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                        Esta Subcategoria já está Cadastrada, Tente Novamente.
                    </p>
                </div>
            </div>


        </div>
    </div>
</body>


@section('script')
    <script>

        $(function () {
            $('#alterarCat').submit(function () {
                $('#btnAlterar').val('Enviando...');
                var id = $('#id').val();
                var data = $(this).serialize();

                var request = $.ajax({
                    method: 'GET',
                    url: '/subCategoria/alterar/' + id,
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
                                    $('#btnAlterar').val('Alterar');
                                    $(this).dialog("close");
                                }
                            }
                        });
                    }
                    else {
                        window.location = '/subCategoria';
                    }
                });

                request.fail(function (e) {
                    console.log('fail');
                    console.log(e);
                });

                return false;
            });

//            $('#nome').bind('keypress', function (event) {
//                var regex = new RegExp("^[a-zA-Z]+$");
//                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
//                if (!regex.test(key)) {
//                    event.preventDefault();
//                    return false;
//                }
//            });
        });


    </script>
@endsection
</html>