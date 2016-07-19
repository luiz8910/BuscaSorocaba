@extends('app')

@section('content')

    <div class="container">

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
                <button type="submit" class="btn btn-primary" href="#">Alterar</button>
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
@endsection

@section('script')
    <script>

        $(function () {
            $('#alterarCat').submit(function () {
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