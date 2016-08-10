@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Novo Filme</h3>

            {!! Form::open(['id' => 'cadastrarFilme', 'class' => 'form', 'method' => 'get']) !!}

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
                {!! Form::label("Nome", "Classificação:") !!}
                <select required class="form-control" name="classificacao">
                    <option value="">Selecione</option>
                    <option value="18+">18+</option>
                    <option value="Livre">Livre</option>
                    <option value="10 Anos">10 Anos</option>
                    <option value="12 Anos">12 Anos</option>
                    <option value="12 Anos">12 Anos</option>
                    <option value="14 Anos">14 Anos</option>
                    <option value="16 Anos">16 Anos</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" id="btnSalvar" class="btn btn-primary" href="#">Salvar</button>
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
        $('#duracao').bind('keypress', function (event) {
            var regex = new RegExp("^[0-9:]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $('.numero').bind('keypress', function (event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $('#cadastrarFilme').submit(function () {
            $('#btnSalvar').html('Enviando...');
            var data = $(this).serialize();

            var request = $.ajax({
                method: 'GET',
                url: '/filme/salvar',
                data: data,
                dataType: 'json'
            });

            request.done(function (e) {
                console.log('done');
                console.log(e);

                if(e.status == false)
                {
                    console.log(e.status);
                    $( "#dialog-message" ).dialog({
                        modal: true,
                        buttons: {
                            Ok: function() {
                                $('#btnSalvar').html('Salvar');
                                $( this ).dialog( "close" );
                            }
                        }
                    });
                }
//                else {
//                    window.location = '/filme';
//                }
            });

            request.fail(function (e) {
                console.log('fail');
                console.log(e);

            });

            return false;
        });
    </script>

@endsection