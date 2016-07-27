@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Categoria Nome: {{ $shopping->nome }}</h3>

            {!! Form::model($shopping, ['id' => 'alterarShopping', 'class' => 'form', 'method' => 'get']) !!}

            <input type="text" hidden id="id" value="{{ $shopping->id }}">

            <div class="form-group">
                {!! Form::label("Nome", "Nome:") !!}
                {!! Form::text("nome", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Shopping das Capivaras']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Produtor:") !!}
                {!! Form::text("cinema", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Cine Araújo, Cinépolis']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "CEP:") !!}
                {!! Form::text("cep", null, ["class" => "form-control numero", 'required' => 'required', 'placeholder' => 'Ex: 18113400']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Logradouro:") !!}
                {!! Form::text("logradouro", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Avenida João da Silva']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Numero:") !!}
                {!! Form::text("numero", null, ["class" => "form-control numero", 'required' => 'required', 'placeholder' => 'Ex: 999']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Bairro:") !!}
                {!! Form::text("bairro", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Pq. Campolim']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Informações:") !!}
                {!! Form::textarea("info", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Informe aqui os valores e outros detalhes do cinema']) !!}
            </div>

            <div class="form-group">
                <button type="submit" id="btnAlterar" class="btn btn-primary" href="#">Alterar</button>
                <a class="btn btn-default" href="{{ route('admin.shoppings.index') }}">Voltar</a>
            </div>

            {!! Form::close() !!}

            <div hidden id="dialog-message" title="Erro">
                <p>
                    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                    Este Shopping já está Cadastrado, Tente Novamente.
                </p>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('#alterarShopping').submit(function () {
                $('#btnAlterar').val('Enviando...');
                var id = $('#id').val();
                var data = $(this).serialize();

                var request = $.ajax({
                    method: 'GET',
                    url: '/shoppings/alterar/' + id,
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
                        window.location = '/shoppings';
                    }
                });

                request.fail(function (e) {
                    console.log('fail');
                    console.log(e);
                });

                return false;
            });

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