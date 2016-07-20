@extends('app')

@section('content')

    <div class="container">
        <h3>Nova Sala</h3>

        {!! Form::open(['id' => 'cadastrarSala', 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label("Nome", "Shopping:") !!}
            <select required class="form-control" name="shopping_id" id="shoppingSala">
                <option value="">Selecione</option>
                @foreach($shopping as $s)
                    <option value="{{ $s->id }}">{{ $s->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Nome:") !!}
            {!! Form::text("numero", null, ["class" => "form-control numero", 'required' => 'required', 'placeholder' => 'Ex: 15, 12', 'disabled' => 'true', 'id' => 'numSala']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Tipo:") !!}
            <select required name="tipo" class="form-control">
                <option value="">Selecione</option>
                <option value="VIP">VIP</option>
                <option value="Macro XE">Macro XE</option>
                <option value="Convencional">Convencional</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" id="btnSalvar" class="btn btn-primary" href="#">Salvar</button>
            <a class="btn btn-default" href="{{ route('admin.sala.index') }}">Voltar</a>
        </div>

        {!! Form::close() !!}

        <div hidden id="dialog-message" title="Erro">
            <p>
                <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                Esta Sala já está Cadastrada, Tente Novamente.
            </p>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.numero').bind('keypress', function (event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $('#cadastrarSala').submit(function () {
            $('#btnSalvar').html('Enviando...');
            var data = $(this).serialize();

            var request = $.ajax({
                method: 'GET',
                url: '/sala/salvar',
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
                else {
                    window.location = '/sala';
                }
            });

            request.fail(function (e) {
                console.log('fail');
                console.log(e);
            });

            return false;
        });
    </script>

@endsection