@extends('app')

@section('content')

    <div class="container">
        <h3>Nova Categoria</h3>

        {!! Form::open(['id' => 'cadastrarCat', 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('Categoria', 'Categoria:') !!}
            {!! Form::Select('categoria_id', $categoria, null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("Nome", "Nome:") !!}
            {!! Form::text("nome", null, ["class" => "form-control", 'required' => 'required']) !!}
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
            <button type="submit" class="btn btn-primary" href="#" data-loading-text = 'Enviando ......'>Salvar</button>
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
@endsection

@section('script')
    <script>

        $( function() {
            $('#cadastrarCat').submit(function () {
                var data = $(this).serialize();

                var request = $.ajax({
                    method: 'GET',
                    url: '/subCategoria/salvar',
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
                                    $( this ).dialog( "close" );
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
        });


    </script>
@endsection