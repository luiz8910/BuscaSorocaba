@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Sub Categorias</h3>

            <a href="{{ route('admin.subcategoria.create') }}" class="btn btn-default">Nova Categoria</a>

            @if(!$sub) {{ 'Não há dados para exibir' }}

            @else
                <table class="table table-bordered table-responsive">
                    <tr>
                        <thead>
                            <th>ID</th>
                            <th>Segmento</th>
                            <th>Categoria</th>
                            <th>Ação</th>
                        </thead>
                    </tr>

                    <tbody>
                    @foreach($sub as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->nome }}</td>
                            <td>{{ $s->categoria->nome }}</td>
                            <td>
                                <a href="{{ route('admin.subcategoria.edit', [$s->id]) }}"><span class="glyphicon glyphicon-edit"></span> </a>
                                |
                                <a class="excluir" href="{{ route('admin.subcategoria.destroy', [$s->id]) }}" id="{{ $s->id }}"><span class="glyphicon glyphicon-trash"></span> </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                {!! $sub->render() !!}

                <div hidden id="dialog-confirm" title="Você está certo disto?">
                    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                        Deseja Excluir esta Subcategoria?
                    </p>
                </div>
        </div>
    </div>

    @endif
@endsection

@section('script')
    <script>
        $(function () {
            $('.excluir').click(function () {
                var id = $(this).attr('id');

                $( "#dialog-confirm" ).dialog({
                    resizable: false,
                    height: "auto",
                    width: 400,
                    modal: true,
                    buttons: {
                        "Excluir": function() {
                            excluir(id);
                            $( this ).dialog( "close" );
                        },
                        Cancelar: function() {
                            $( this ).dialog( "close" );
                        }
                    }
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

            function excluir(id)
            {
                var request = $.ajax({
                    method: 'GET',
                    url: '/subCategoria/excluir/'+id,
                    data: id,
                    dataType: 'json'
                });

                request.done(function (e) {
                    console.log('done');
                    console.log(e);

                    if (e.status == false) {
                        console.log(e.status);

                    }
                    else {

                        window.location = '/subCategoria';
                    }
                });
            }

        });
    </script>
@endsection