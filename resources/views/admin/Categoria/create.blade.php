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

                    {!! Form::open(['id' => 'cadastrarCat', 'method' => 'get']) !!}

                    <div class="form-group">
                        {!! Form::label("Nome", "Nome:") !!}
                        {!! Form::text("nome", null, ["class" => "form-control", 'required' => 'required', 'id' => 'nome']) !!}
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" href="#">Salvar</button>
                        <a class="btn btn-default" href="{{ route('admin.categoria.index') }}">Voltar</a>
                    </div>

                    {!! Form::close() !!}

                    <div hidden id="dialog-message" title="Erro">
                        <p>
                            <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
                            Esta Categoria já está Cadastrada, Tente Novamente.
                        </p>
                    </div>
                </div>

            </div>
        </div>


    </body>
</html>
@section('script')
    <script>

        $( function() {
            $('#cadastrarCat').submit(function () {
                var data = $(this).serialize();

                var request = $.ajax({
                    method: 'GET',
                    url: '/categoria/salvar',
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
                        window.location = '/categoria';
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