@extends('app')

@section('content')

    <div class="container">

        <div class="row">
            <h3>Nome: {{ $filme->nome }}</h3>

            {!! Form::model($filme, ['id' => 'alterarFilme', 'class' => 'form', 'method' => 'get', 'files' => 'true']) !!}

            <input type="text" hidden id="id" value="{{ $filme->id }}">

            <div class="form-group">
                {!! Form::label("Nome", "Nome:") !!}
                {!! Form::text("nome", null, ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Deadpool, O Rei Leão']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Duração:") !!}
                {!! Form::text("duracao", null,
                ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: 02:35', 'id' => 'duracao'])
                !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Imagem do Filme:") !!}
                {!! Form::file("img", null,
                ["class" => "form-control", 'required' => 'required', 'placeholder' => 'Ex: Deadpool, O Rei Leão']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Classificação:") !!}
                <select required class="form-control" name="classificacao">
                    @if($filme->classificacao == '18+')<option value="18+" selected>18+</option>@else<option value="18+">18+</option>@endif
                    @if($filme->classificacao == 'Livre')<option value="Livre" selected>Livre</option>@else<option value="Livre">Livre</option>@endif
                    @if($filme->classificacao == '10 Anos')<option value="10 Anos" selected>10 Anos</option>@else<option value="10 Anos">10 Anos</option>@endif
                </select>
            </div>

            <div class="form-group">
                <button type="submit" id="btnAlterar" class="btn btn-primary" href="#">Alterar</button>
                <a class="btn btn-default" href="{{ route('admin.filme.index') }}">Voltar</a>
            </div>

            {!! Form::close() !!}

            <div hidden id="dialog-message" title="Erro">
                <p>
                    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                    Este Filme já está Cadastrado, Tente Novamente.
                </p>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('#duracao').bind('keypress', function (event) {
                var regex = new RegExp("[0-9:]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });

            $('#alterarFilme').submit(function () {
                $('#btnAlterar').val('Enviando...');
                var id = $('#id').val();
                var data = $(this).serialize();

                var request = $.ajax({
                    method: 'GET',
                    url: '/filme/alterar/' + id,
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
                        window.location = '/filme';
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