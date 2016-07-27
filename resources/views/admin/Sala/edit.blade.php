@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Sala numero: {{ $sala->numero }}</h3>

            {!! Form::model($sala, ['id' => 'alterarSala', 'class' => 'form', 'method' => 'get']) !!}

            <input hidden value="{{ $sala->id }}" id="id">

            <div class="form-group">
                {!! Form::label("Nome", "Shopping:") !!}
                <select required class="form-control" name="shopping_id" id="shoppingSala">
                    @foreach($shopping as $s)
                        @if($sala->shopping->id == $s->id)
                            <option selected value="{{ $s->id }}">{{ $s->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Numero:") !!}
                {!! Form::text("numero", null, ["class" => "form-control numero", 'required' => 'required', 'placeholder' => 'Ex:14, 18, 01', 'id' => 'numSala']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Tipo:") !!}
                <select required name="tipo" class="form-control">
                    <option value="VIP">VIP</option>
                    <option value="Macro XE">Macro XE</option>
                    <option value="Convencional">Convencional</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" id="btnAlterar" class="btn btn-primary" href="#">Alterar</button>
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

    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('#alterarSala').submit(function () {
                $('#btnAlterar').val('Enviando...');
                var id = $('#id').val();
                var data = $(this).serialize();

                var request = $.ajax({
                    method: 'GET',
                    url: '/sala/alterar/' + id,
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
                        window.location = '/sala';
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